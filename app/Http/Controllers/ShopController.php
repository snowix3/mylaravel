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
      try {
      $dbArr = DB::select('select * from shop_reservation_disp_jonathans where id=1');//ID=1のレコードを取りにいく。
        $c=0;
        $key;
        foreach ($dbArr as $key1) {
          $key=$key1;
          $c++;
        }
        if (isset($key)){//DBの存在チェック
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
        }else {//エラー時
            $e="E002:ueueruts error";
            return view('reservation/shop')->with('e',$e);
          }

      } catch (Exception $e) {//エラー時
//        echo "E003:".$e;
        return view('reservation/shop')->with('e',$e);
      }
        return view('reservation/shop')->with('timeArr3',$keyArr)->with('quantityArr2',$valueArr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        DB::insert('insert into shop_reservation_disp_jonathans(id,shop_name)values(1,"jonathans")');//指定したIDのレコードを作成する。shop_nameも指定すること。
        return 'create Successfully done!<br><a href="../">TOP</a>';
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
          DB::table('shop_reservation_disp_jonathans')
                ->where('id', 1)//ID=1のレコードを取りにいく。
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
