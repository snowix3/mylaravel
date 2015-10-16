<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopUserInfoJonathans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('shop_user_info_jonathans', function (Blueprint $table) {
          $table->increments('id');
          $table->string('user_name');
          $table->string('user_id');
          $table->string('email');
          $table->string('password');
          $table->integer('age');
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
        Schema::drop('shop_user_info_jonathans');
    }
}
