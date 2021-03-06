<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopReservationDispJonathansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_reservation_disp_jonathans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name');
            $table->timestamps();
            $table->integer('mon_00_00');
            $table->integer('mon_00_30');
            $table->integer('mon_01_00');
            $table->integer('mon_01_30');
            $table->integer('mon_02_00');
            $table->integer('mon_02_30');
            $table->integer('mon_03_00');
            $table->integer('mon_03_30');
            $table->integer('mon_04_00');
            $table->integer('mon_04_30');
            $table->integer('mon_05_00');
            $table->integer('mon_05_30');
            $table->integer('mon_06_00');
            $table->integer('mon_06_30');
            $table->integer('mon_07_00');
            $table->integer('mon_07_30');
            $table->integer('mon_08_00');
            $table->integer('mon_08_30');
            $table->integer('mon_09_00');
            $table->integer('mon_09_30');
            $table->integer('mon_10_00');
            $table->integer('mon_10_30');
            $table->integer('mon_11_00');
            $table->integer('mon_11_30');
            $table->integer('mon_12_00');
            $table->integer('mon_12_30');
            $table->integer('mon_13_00');
            $table->integer('mon_13_30');
            $table->integer('mon_14_00');
            $table->integer('mon_14_30');
            $table->integer('mon_15_00');
            $table->integer('mon_15_30');
            $table->integer('mon_16_00');
            $table->integer('mon_16_30');
            $table->integer('mon_17_00');
            $table->integer('mon_17_30');
            $table->integer('mon_18_00');
            $table->integer('mon_18_30');
            $table->integer('mon_19_00');
            $table->integer('mon_19_30');
            $table->integer('mon_20_00');
            $table->integer('mon_20_30');
            $table->integer('mon_21_00');
            $table->integer('mon_21_30');
            $table->integer('mon_22_00');
            $table->integer('mon_22_30');
            $table->integer('mon_23_00');
            $table->integer('mon_23_30');

            $table->integer('tue_00_00');
            $table->integer('tue_00_30');
            $table->integer('tue_01_00');
            $table->integer('tue_01_30');
            $table->integer('tue_02_00');
            $table->integer('tue_02_30');
            $table->integer('tue_03_00');
            $table->integer('tue_03_30');
            $table->integer('tue_04_00');
            $table->integer('tue_04_30');
            $table->integer('tue_05_00');
            $table->integer('tue_05_30');
            $table->integer('tue_06_00');
            $table->integer('tue_06_30');
            $table->integer('tue_07_00');
            $table->integer('tue_07_30');
            $table->integer('tue_08_00');
            $table->integer('tue_08_30');
            $table->integer('tue_09_00');
            $table->integer('tue_09_30');
            $table->integer('tue_10_00');
            $table->integer('tue_10_30');
            $table->integer('tue_11_00');
            $table->integer('tue_11_30');
            $table->integer('tue_12_00');
            $table->integer('tue_12_30');
            $table->integer('tue_13_00');
            $table->integer('tue_13_30');
            $table->integer('tue_14_00');
            $table->integer('tue_14_30');
            $table->integer('tue_15_00');
            $table->integer('tue_15_30');
            $table->integer('tue_16_00');
            $table->integer('tue_16_30');
            $table->integer('tue_17_00');
            $table->integer('tue_17_30');
            $table->integer('tue_18_00');
            $table->integer('tue_18_30');
            $table->integer('tue_19_00');
            $table->integer('tue_19_30');
            $table->integer('tue_20_00');
            $table->integer('tue_20_30');
            $table->integer('tue_21_00');
            $table->integer('tue_21_30');
            $table->integer('tue_22_00');
            $table->integer('tue_22_30');
            $table->integer('tue_23_00');
            $table->integer('tue_23_30');

            $table->integer('wed_00_00');
            $table->integer('wed_00_30');
            $table->integer('wed_01_00');
            $table->integer('wed_01_30');
            $table->integer('wed_02_00');
            $table->integer('wed_02_30');
            $table->integer('wed_03_00');
            $table->integer('wed_03_30');
            $table->integer('wed_04_00');
            $table->integer('wed_04_30');
            $table->integer('wed_05_00');
            $table->integer('wed_05_30');
            $table->integer('wed_06_00');
            $table->integer('wed_06_30');
            $table->integer('wed_07_00');
            $table->integer('wed_07_30');
            $table->integer('wed_08_00');
            $table->integer('wed_08_30');
            $table->integer('wed_09_00');
            $table->integer('wed_09_30');
            $table->integer('wed_10_00');
            $table->integer('wed_10_30');
            $table->integer('wed_11_00');
            $table->integer('wed_11_30');
            $table->integer('wed_12_00');
            $table->integer('wed_12_30');
            $table->integer('wed_13_00');
            $table->integer('wed_13_30');
            $table->integer('wed_14_00');
            $table->integer('wed_14_30');
            $table->integer('wed_15_00');
            $table->integer('wed_15_30');
            $table->integer('wed_16_00');
            $table->integer('wed_16_30');
            $table->integer('wed_17_00');
            $table->integer('wed_17_30');
            $table->integer('wed_18_00');
            $table->integer('wed_18_30');
            $table->integer('wed_19_00');
            $table->integer('wed_19_30');
            $table->integer('wed_20_00');
            $table->integer('wed_20_30');
            $table->integer('wed_21_00');
            $table->integer('wed_21_30');
            $table->integer('wed_22_00');
            $table->integer('wed_22_30');
            $table->integer('wed_23_00');
            $table->integer('wed_23_30');

            $table->integer('thu_00_00');
            $table->integer('thu_00_30');
            $table->integer('thu_01_00');
            $table->integer('thu_01_30');
            $table->integer('thu_02_00');
            $table->integer('thu_02_30');
            $table->integer('thu_03_00');
            $table->integer('thu_03_30');
            $table->integer('thu_04_00');
            $table->integer('thu_04_30');
            $table->integer('thu_05_00');
            $table->integer('thu_05_30');
            $table->integer('thu_06_00');
            $table->integer('thu_06_30');
            $table->integer('thu_07_00');
            $table->integer('thu_07_30');
            $table->integer('thu_08_00');
            $table->integer('thu_08_30');
            $table->integer('thu_09_00');
            $table->integer('thu_09_30');
            $table->integer('thu_10_00');
            $table->integer('thu_10_30');
            $table->integer('thu_11_00');
            $table->integer('thu_11_30');
            $table->integer('thu_12_00');
            $table->integer('thu_12_30');
            $table->integer('thu_13_00');
            $table->integer('thu_13_30');
            $table->integer('thu_14_00');
            $table->integer('thu_14_30');
            $table->integer('thu_15_00');
            $table->integer('thu_15_30');
            $table->integer('thu_16_00');
            $table->integer('thu_16_30');
            $table->integer('thu_17_00');
            $table->integer('thu_17_30');
            $table->integer('thu_18_00');
            $table->integer('thu_18_30');
            $table->integer('thu_19_00');
            $table->integer('thu_19_30');
            $table->integer('thu_20_00');
            $table->integer('thu_20_30');
            $table->integer('thu_21_00');
            $table->integer('thu_21_30');
            $table->integer('thu_22_00');
            $table->integer('thu_22_30');
            $table->integer('thu_23_00');
            $table->integer('thu_23_30');

            $table->integer('fri_00_00');
            $table->integer('fri_00_30');
            $table->integer('fri_01_00');
            $table->integer('fri_01_30');
            $table->integer('fri_02_00');
            $table->integer('fri_02_30');
            $table->integer('fri_03_00');
            $table->integer('fri_03_30');
            $table->integer('fri_04_00');
            $table->integer('fri_04_30');
            $table->integer('fri_05_00');
            $table->integer('fri_05_30');
            $table->integer('fri_06_00');
            $table->integer('fri_06_30');
            $table->integer('fri_07_00');
            $table->integer('fri_07_30');
            $table->integer('fri_08_00');
            $table->integer('fri_08_30');
            $table->integer('fri_09_00');
            $table->integer('fri_09_30');
            $table->integer('fri_10_00');
            $table->integer('fri_10_30');
            $table->integer('fri_11_00');
            $table->integer('fri_11_30');
            $table->integer('fri_12_00');
            $table->integer('fri_12_30');
            $table->integer('fri_13_00');
            $table->integer('fri_13_30');
            $table->integer('fri_14_00');
            $table->integer('fri_14_30');
            $table->integer('fri_15_00');
            $table->integer('fri_15_30');
            $table->integer('fri_16_00');
            $table->integer('fri_16_30');
            $table->integer('fri_17_00');
            $table->integer('fri_17_30');
            $table->integer('fri_18_00');
            $table->integer('fri_18_30');
            $table->integer('fri_19_00');
            $table->integer('fri_19_30');
            $table->integer('fri_20_00');
            $table->integer('fri_20_30');
            $table->integer('fri_21_00');
            $table->integer('fri_21_30');
            $table->integer('fri_22_00');
            $table->integer('fri_22_30');
            $table->integer('fri_23_00');
            $table->integer('fri_23_30');

            $table->integer('sat_00_00');
            $table->integer('sat_00_30');
            $table->integer('sat_01_00');
            $table->integer('sat_01_30');
            $table->integer('sat_02_00');
            $table->integer('sat_02_30');
            $table->integer('sat_03_00');
            $table->integer('sat_03_30');
            $table->integer('sat_04_00');
            $table->integer('sat_04_30');
            $table->integer('sat_05_00');
            $table->integer('sat_05_30');
            $table->integer('sat_06_00');
            $table->integer('sat_06_30');
            $table->integer('sat_07_00');
            $table->integer('sat_07_30');
            $table->integer('sat_08_00');
            $table->integer('sat_08_30');
            $table->integer('sat_09_00');
            $table->integer('sat_09_30');
            $table->integer('sat_10_00');
            $table->integer('sat_10_30');
            $table->integer('sat_11_00');
            $table->integer('sat_11_30');
            $table->integer('sat_12_00');
            $table->integer('sat_12_30');
            $table->integer('sat_13_00');
            $table->integer('sat_13_30');
            $table->integer('sat_14_00');
            $table->integer('sat_14_30');
            $table->integer('sat_15_00');
            $table->integer('sat_15_30');
            $table->integer('sat_16_00');
            $table->integer('sat_16_30');
            $table->integer('sat_17_00');
            $table->integer('sat_17_30');
            $table->integer('sat_18_00');
            $table->integer('sat_18_30');
            $table->integer('sat_19_00');
            $table->integer('sat_19_30');
            $table->integer('sat_20_00');
            $table->integer('sat_20_30');
            $table->integer('sat_21_00');
            $table->integer('sat_21_30');
            $table->integer('sat_22_00');
            $table->integer('sat_22_30');
            $table->integer('sat_23_00');
            $table->integer('sat_23_30');

            $table->integer('sun_00_00');
            $table->integer('sun_00_30');
            $table->integer('sun_01_00');
            $table->integer('sun_01_30');
            $table->integer('sun_02_00');
            $table->integer('sun_02_30');
            $table->integer('sun_03_00');
            $table->integer('sun_03_30');
            $table->integer('sun_04_00');
            $table->integer('sun_04_30');
            $table->integer('sun_05_00');
            $table->integer('sun_05_30');
            $table->integer('sun_06_00');
            $table->integer('sun_06_30');
            $table->integer('sun_07_00');
            $table->integer('sun_07_30');
            $table->integer('sun_08_00');
            $table->integer('sun_08_30');
            $table->integer('sun_09_00');
            $table->integer('sun_09_30');
            $table->integer('sun_10_00');
            $table->integer('sun_10_30');
            $table->integer('sun_11_00');
            $table->integer('sun_11_30');
            $table->integer('sun_12_00');
            $table->integer('sun_12_30');
            $table->integer('sun_13_00');
            $table->integer('sun_13_30');
            $table->integer('sun_14_00');
            $table->integer('sun_14_30');
            $table->integer('sun_15_00');
            $table->integer('sun_15_30');
            $table->integer('sun_16_00');
            $table->integer('sun_16_30');
            $table->integer('sun_17_00');
            $table->integer('sun_17_30');
            $table->integer('sun_18_00');
            $table->integer('sun_18_30');
            $table->integer('sun_19_00');
            $table->integer('sun_19_30');
            $table->integer('sun_20_00');
            $table->integer('sun_20_30');
            $table->integer('sun_21_00');
            $table->integer('sun_21_30');
            $table->integer('sun_22_00');
            $table->integer('sun_22_30');
            $table->integer('sun_23_00');
            $table->integer('sun_23_30');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop_reservation_disp_jonathans');
    }
}
