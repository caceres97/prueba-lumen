<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Users', function(Blueprint $table){
        $table->increments('id');
        $table->string('firstnames', 60);
        $table->string('lastnames', 60);
        $table->string('nickname', 60)->unique();
        $table->string('password', 500);
        $table->string('remark', 150);
        $table->rememberToken();

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
      Schema::frop('Users');
    }
}
