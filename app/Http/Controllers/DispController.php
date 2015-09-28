<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DispController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $now = DB::select('select current_timestamp');//DBの現在時刻を取りに行く
      $dbtime;//DBの現在時刻を格納。
      foreach ($now as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
          $dbtime = $value2;
        }
      }
      return view('reservation/disp')->with('dbtime',$dbtime);
    }
/*
$now = DB::select('select current_timestamp');//DBの現在時刻を取りに行く
$dbtime;//DBの現在時刻を格納。
foreach ($now as $key1 => $value1) {
  foreach ($value1 as $key2 => $value2) {
    $dbtime = $value2;
  }
}
echo "aaaaaaaaaaaaa";
echo $dbtime;
return view('reservation/disp');
*/
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return 'store Successfully done!';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $user_name = $request->input('user_name');
      $detail = $request->input('detail');
      $reservation_time = $request->input('reservation_time');
      $now = DB::select('select current_timestamp');//DBの現在時刻を取りに行く
      $dbtime;//DBの現在時刻を格納。
      foreach ($now as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
          $dbtime = $value2;
        }
      }
      DB::table('shop_reservation_jonathans')->insert(['user_name' => $user_name, 'detail' => $detail, 'reservation_time' => $reservation_time]);

      //print_r($now);
      /*日付から曜日を取得する*/
      //$datetime = date_create($reservation_time);
      $datetime = date_create($dbtime);//DBの時刻をいれる
      //echo $reservation_time;
      $week = array("日", "月", "火", "水", "木", "金", "土");
      $w = (int)date_format($datetime, 'w');
      //echo $week[$w];
      return 'store Successfully done!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return 'show Successfully done!';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return 'edit Successfully done!';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return 'update Successfully done!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return 'destroy Successfully done!';
    }
}
