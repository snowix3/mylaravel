<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
/*
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\shop_reservation_jonathans;//レストフルコントローラーの実装のためには、Modelを指定しインポートする　use DB;もいらない
use App\shop_reservation_disp_jonathans;
use Illuminate\Http\RedirectResponse;//追加
use Illuminate\Http\Response;//追加
*/


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $dbArr = DB::select('select * from shop_reservation_disp_jonathans where id=1');//ID=1のレコードを取りにいく。
        $c=0;
        $key;
        foreach ($dbArr as $key1) {
          $key=$key1;
          $c++;
        }
        $c=0;

        foreach ($key as $key2) {//キー名を取得
          $keyArr[$c]=key($key);
          $c++;
        }
        $c=0;
        array_splice($keyArr, 0, 3);//$keyArrにはキー名が順番に格納されている。配列の3番目までを削除

        foreach ($key as $key2) {//値を取得
          $valueArr[$c]=$key2;
          $c++;
        }
        array_splice($valueArr, 0, 4);//$valueArrには値が格納されている。配列の4番目までを削除
/*
        $i=0;
        $j=0;
        $array = DB::select("show columns from shop_reservation_disp_jonathans");
        foreach ($array as $key) {
            $timeArr[$i] = $key;//カラム名取得
            foreach ($timeArr[$i] as $key2) {//カラム名取得
                $timeArr2[$j] = $key2;//カラム名取得
                if ($i>=4) {//カラム名取得 4以下無視
                  if ($j==0) {//カラム名取得したときに実行
                    $quantityArr[$i] = DB::table('shop_reservation_disp_jonathans')->lists($timeArr2[$j]);//カラム名で値を取得し配列に保存
                    //foreach ($arrayED[$i] as $key3) {
                    foreach ($quantityArr[$i] as $key3) {
                        $quantityArr2[$i]=$key3;//取り出した値が全部はいってる
                        //echo $quantityArr2[$i]."<br>";//値が入る
                    }
                    $timeArr3[$i]=$timeArr2[0];
                    //echo $timeArr3[$i]."<br>";
                  }
                }
                $j++;
            }
            $j=0;
            $i++;
        }
*/
        return view('reservation/shop')->with('timeArr3',$keyArr)->with('quantityArr2',$valueArr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        DB::insert('insert into shop_reservation_disp_jonathans(id)values(4)');
        return view('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)//postされたらここのメソッドが実行されるようにルートで記述してある。これがレストフル。
    {
      $now = date('Y-m-d-h-m-s');//タイムスタンプ作成
      $all = $request->all();
      $cnt = count($all)-1;
      $timeArr = array();
      $quantityArr = array();
      $i = 0;

      // 連想配列からキーを取得。
      $keys = array_keys($all);

      // 配列数分ループして、キーを取り出して表示する。
      foreach ($keys as $key) {
          if ($key==end($keys)) {
            //最後にcsrfが入るので最後ならforeachから抜ける処理
            break;
          }
          $timeArr[$i] = $key;
          //echo   "time配列：".$timeArr[$i]."</br>";
          $i++;
      }
      $i=0;
      foreach($all as $value){//foreach が扱えるのは配列変数等のオブジェクトに限られます。（厳密にはイテレータを持つオブジェクト）
          if ($value==end($all)) {
            //最後にcsrfが入るので最後ならforeachから抜ける処理
            break;
          }

          $quantityArr[$i] = $value;
          //echo   "quantity配列：".$quantityArr[$i]."</br>";
          //echo $quantityArr[$i];
          DB::table('shop_reservation_disp_jonathans')
                ->where('id', 1)
                ->update([$timeArr[$i] => $quantityArr[$i]]);
          $i++;
      }
      DB::table('shop_reservation_disp_jonathans')
            ->update(['updated_at' => $now]);//更新日時
      //表示ここから
      $timeArr = array();
      $timeArr2 = array();
      $timeArr3 = array();
      $quantityArr = array();
      $quantityArr2 = array();
      $dbArr = DB::select('select * from shop_reservation_disp_jonathans where id=1');//ID=1のレコードを取りにいく。
      $c=0;
      $key;
      foreach ($dbArr as $key1) {
        $key=$key1;
        $c++;
      }
      $c=0;

      foreach ($key as $key2) {//キー名を取得
        $keyArr[$c]=key($key);
        $c++;
      }
      $c=0;
      array_splice($keyArr, 0, 3);//$keyArrにはキー名が順番に格納されている。配列の４番目までを削除

      foreach ($key as $key2) {//値を取得
        $valueArr[$c]=$key2;
        $c++;
      }
      array_splice($valueArr, 0, 4);//$valueArrには値が格納されている。配列の４番目までを削除
      return view('reservation/shop')->with('timeArr3',$keyArr)->with('quantityArr2',$valueArr);
//      return view('reservation/shop')->with('timeArr3',$timeArr3)->with('quantityArr2',$quantityArr2);
      //ここまで
//      return view('reservation.shop')->with('quantityArr',$quantityArr);

//      print_r($request->all());
//UPDATE 対象となるテーブル SET 更新対象となる列名 = 新しく更新するデータ WHERE 検索条件対象となる列名 = 検索条件対象となるフィールドの値;
//SELECT *FROM 対象となるテーブル WHERE 検索条件対象となる列名 LIKE '%特定の文字列%';
//      shop_reservation_disp_jonathans::update('UPDATE shop_reservation_disp_jonathans SET mon_01_00 = ? WHERE id = 1');
//      shop_reservation_disp_jonathans::insert(['created_at' => $now]);//新規作成日時
//      shop_reservation_disp_jonathans::update('s', ['1']);
//mysql> delete from shop_reservation_disp_jonathans WHERE id = 2;
//mysql> UPDATE shop_reservation_disp_jonathans SET mon_01_00 = 3 WHERE id = 1;
//DB::statement('drop table users'); 通常のSQL文を実行

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
