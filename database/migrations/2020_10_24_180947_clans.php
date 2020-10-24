<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profile_admin')->nullable();
            $table->string('name');
            $table->string('tag');
            $table->string('logo');
            $table->date('foundation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clans');
    }
}
