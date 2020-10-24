<?php

namespace App\Jobs;

use App\Models\Profiles;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CdHashLine implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $layout = [
      'last_update',
      'hash',
      'steam_level',
      'nickname',
      'date_created',
      'id_address',
      'steam_tags'
    ];

    public $line_content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $line_content )
    {

        $index = 0;
        $this->line_content = collect(explode("\t",$line_content));
       /* $this->line_content = collect(explode("\t",$line_content))->map(function ($obj) use($index) {
            $index++;
            return [$this->layout[$index-1]] = $obj;
        })->toArray();*/
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        $bind = [];
        foreach($this->layout as $index=>$key){
            $bind[ $key ] = $this->line_content[ $index ];
        }

        $scope = [
            'nickname' => $bind['nickname'],
            'hash' => $bind['hash'],
            'steam_level' => $bind['steam_level'],
            'steam_tags' => $bind['steam_tags'],
        ];

        $Profile = Profiles::firstOrCreate([
            'nickname' => $bind['nickname'],
            'hash' => $bind['hash'],
        ]);

        $Profile->steam_level = $bind['steam_level'];

        if($bind['steam_tags']){
            $Profile->steam_tags = $this->getTags($bind['steam_tags']);
        }

        $Profile->save();

    }

    public function getTags( $string ){
        $string = str_replace('(','',$string);
        $string = str_replace("\r",'',$string);
        $string = strtolower($string);
        return array_filter(explode(')',$string));
    }
}
