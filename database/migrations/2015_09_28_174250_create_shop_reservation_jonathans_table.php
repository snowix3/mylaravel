<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopReservationJonathansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_reservation_jonathans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_number');
            $table->string('user_name');
            $table->timestamp('reservation_time');
            $table->integer('amount');
            $table->string('plan');
            $table->integer('head_count');
            $table->string('detail');
            $table->string('staff');
            $table->integer('point');
            $table->boolean('comfirm_flag');
            $table->boolean('delete_flag');
            $table->timestamps();
/*予約日時　ユーザー名　金額　予約プラン（クーポン）　人数　予約内容　担当者　加算ポイント　入力時刻
date user_name amount plan head_count detail staff point */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop_reservation_jonathans');
    }
}
