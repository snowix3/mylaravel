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
//      echo $dbtime;
      //1.同じ日時の予約在庫数に問い合わせて設定を確認し、予約情報に問い合わせて差分がいくつあるかを表示する。
      try {
        $week = array("E004","mon", "tue", "wed", "thu", "fri", "sat", "sun");//曜日を表示するために文字を格納
//        $search = $week[date('w',strtotime($dbtime))]."_".date('H_i', strtotime($dbtime));

        $hour=0;
        $min=0;
        $c=0;
        $dbcount=array();
        /*日付・日時ごとの予約数を”横”に出力する*/
        for ($i=0; $i < 48 ; $i++){
          for ($j=0; $j < 7; $j++) {
            $dbcountArr = DB::select('select count(reservation_time) from shop_reservation_jonathans
            where reservation_time="'.date('Y-m-d ', strtotime($dbtime.("+$j day"))).$hour.':'.$min.':00"');
            foreach ($dbcountArr as $key1 => $value1) {
              foreach ($value1 as $key2 => $value2) {
                $dbcount[$c] = $value2;
              //  echo $dbcount[$c].",";
                $c++;
              }
            }
          }
          if($min==0){//時刻を30分ずつずらす。
              $min=30;
          }else{//1時間増やす
              $min=0;
              $hour++;
          }
      //    echo "-<br>";
        }
        $hour=0;
        $min=0;
        $c=0;
        /*日時ごとの予約在庫数を取りに行って”横”に出力していく。*/
        $dbArr = DB::select('select * from shop_reservation_disp_jonathans where id=1');//ID=1のレコードを取りにいく。
        $stock=array();
        //曜日を数値で取得して数値から配列中の文字を選んで表示する。後半は$dbtimeの時_分という形式に整形。
        for ($i=0; $i < 48 ; $i++) {
          for ($j=0; $j < 7; $j++) {
            $search = $week[date('N',strtotime($dbtime.("+$j day")))]."_".sprintf('%02d', $hour)."_".sprintf('%02d', $min);//"00_00"
            foreach ($dbArr as $key1) {
              $key=$key1;
              $stock[$c] = ($key->$search);//キーを指定して値を取り出す。
        //      echo $stock[$c];
              $c++;
            }
          }
      //    echo "-<br>";
          if($min==0){//時刻を30分ずつずらす。
              $min=30;
          }else{//1時間増やす
              $min=0;
              $hour++;
          }
        }

        /*計算 $stock(予約在庫数)-$dbcount(予約数)*/
        $a = array();
        for ($i=0; $i < 336 ; $i++) {
          $a[$i] = $stock[$i]-$dbcount[$i];
        //  echo $a[$i]."<br>";
        }

      } catch (Exception $e) {//エラー時
//        echo "E003:".$e;
        return view('reservation/disp')->with('e',$e);
      }
      return view('reservation/disp')->with('dbtime',$dbtime)->with('a',$a);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $user_name = $request->input('user_name');
        return 'create Successfully done!';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
//      $user_name = $request->input('user_name');
//      $detail = $request->input('detail');
      $reservation_time = $request->input('reservation_time');
      $now = DB::select('select current_timestamp');//DBの現在時刻を取りに行く
      $dbtime;//DBの現在時刻を格納。
      foreach ($now as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
          $dbtime = $value2;
        }
      }
      DB::table('shop_reservation_jonathans')
      ->insert([//'user_name' => $user_name,
      //'detail' => $detail,
      'reservation_time' => $reservation_time]);
      $datetime = date_create($dbtime);//DBの時刻をいれる
      $week = array("日", "月", "火", "水", "木", "金", "土");
      $w = (int)date_format($datetime, 'w');//echo $week[$w];
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
