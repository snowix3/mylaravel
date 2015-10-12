<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop_reservation_jonathans extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shop_reservation_jonathans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = [user_name,reservation_time,amount,plan,head_count,detail,staff,point,comfirm_flag,delete_flag];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];
    public $timestamps = true;
}
