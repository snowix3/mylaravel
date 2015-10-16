<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name');
            $table->string('plan1_name');
            $table->integer('plan1_price');
            $table->string('plan1_detail');
            $table->string('plan2_name');
            $table->integer('plan2_price');
            $table->string('plan2_detail');
            $table->string('plan3_name');
            $table->integer('plan3_price');
            $table->string('plan3_detail');
            $table->string('plan4_name');
            $table->integer('plan4_price');
            $table->string('plan4_detail');
            $table->string('plan5_name');
            $table->integer('plan5_price');
            $table->string('plan5_detail');
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
        Schema::drop('shop_plan_jonathans');
    }
}
