<?php

namespace App\Jobs;

use App\Models\Servers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Ixudra\Curl\Facades\Curl;
use Mockery\Exception;

class ServerSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $server_id;
    protected $server;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $server_id )
    {
        $this->server_id = $server_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->server = Servers::where('id',$this->server_id)->first();

        try {

            $response = Cache::remember('query_hash_'.$this->server_id,100,function (){
                return Curl::to($this->server->endpoint_cd_hash)
                    ->withAuthorization('Basic '.base64_encode($this->server->endpoint_username.':'.$this->server->endpoint_password))
                    ->get();
            });

            foreach(explode("\n",$response) as $line){
                if(strlen($line)>=10){
                    dispatch_now( new CdHashLine( $line ));
                }
            }



            Servers::where('id',$this->server_id)->update([
                'status'=>'active'
            ]);

          #  dd(explode("\n",$response));

        }catch (Exception $exception){

            Servers::where('id',$this->server_id)->update([
                'status'=>'error'
            ]);

            throw new \Exception( $exception->getMessage() );
        }
    }
}
