<?php

namespace App\Console\Commands;

use App\Models\Admins;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {username} {password} ';

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

        $checkExists = Admins::where('username',$this->argument('username'))->count();

        if( $checkExists == 0 ){

            Admins::create([
                'active' => true,
                'nickname' => $this->argument('username'),
                'username' => $this->argument('username'),
                'password' => Hash::make($this->argument('password'))
            ]);

            $this->info(' Admin Created ');

        }else{

            $this->error(' Admin has exists. ');

        }
    }
}
