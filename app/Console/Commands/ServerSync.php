<?php

namespace App\Console\Commands;

use App\Models\Admins;
use App\Models\Servers;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ServerSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:sync {server_id} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create User Admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $server_id = (int) $this->argument('server_id');
        Servers::where('id',$server_id)->update([
            'status'=>'updating'
        ]);
        try {

            dispatch( new \App\Jobs\ServerSync( $server_id ) );
        }catch (\Exception $exception){
            Servers::where('id',$server_id)->update([
                'status'=>'error'
            ]);
        }
    }
}
