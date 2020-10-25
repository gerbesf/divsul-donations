<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Balance extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( \App\Models\Balance::where('id',1)->count() == 0 ){

            \App\Models\Balance::create([
                'id'=>1,
                'currency'=>'R$',
                'amount'=>0,
                'meta'=>number_format(130,2,'.','')
            ]);
        }
    }
}
