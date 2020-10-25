<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('donations');
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->boolean('confirmed')->default(false);
            $table->boolean('hide_profile')->default(false);
            $table->bigInteger('id_profile');
            $table->bigInteger('id_method');
            $table->string('currency');
            $table->string('currency_received');
            $table->float('amount');
            $table->float('amount_received')->nullable();
            $table->json('receipt')->nullable();
            $table->timestamp('date_created');
            $table->timestamp('date_confirmed')->nullable();
            $table->index(['id_profile']);
            #$table->index(['month_index','year_index']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
