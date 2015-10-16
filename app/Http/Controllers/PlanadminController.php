<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlanadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      //DBのshop_plan_jonathansテーブルからjonathansという名前のお店の情報を全部ひっぱる

      //イテレータで配列から連想配列を取り出す。
      if (DB::select('select * from shop_plan where shop_name="jonathans"')){
      $dbArr = DB::select('select * from shop_plan where shop_name="jonathans"');
      foreach ($dbArr as $key => $value) {
        $dbArr = $value;//$dbArrにオブジェクトでDBの内容が入っている。下記URL参照。
        /*http://www.hiromedo.com/memo-to-log/?p=532*/
      }
//        echo $dbArr->shop_name;//$dbArrというオブジェクトからshop_nameを取り出している。
        return View('reservation.planadmin')->with('dbArr',$dbArr);
      }else {
        echo "E006:配列が存在しません。作成してください。";
        return view('reservation.planadmin');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    //お店プランの新規作成
    DB::insert('insert into shop_plan(shop_name)values("jonathans")');
      echo "create success";
      return 'create Successfully done!<br><a href="../">TOP</a>';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      //指定したお店に入力したプランの内容を追加する
      for ($i=1; $i < 6 ; $i++) {
        DB::table('shop_plan')
        ->where('id', 1)
        ->update([
        'shop_name' => 'jonathans',
        'plan'.$i.'_name' => $request->input('plan'.$i.'_name'),
        'plan'.$i.'_detail' => $request->input('plan'.$i.'_detail'),
        'plan'.$i.'_price' => $request->input('plan'.$i.'_price')
        ]);
      }

      /*表示ここから*/
      //DBのshop_plan_jonathansテーブルからjonathansという名前のお店の情報を全部ひっぱる
      $dbArr = DB::select('select * from shop_plan where shop_name="jonathans"');
      //イテレータで配列から連想配列を取り出す。
      foreach ($dbArr as $key => $value) {
        $dbArr = $value;//$dbArrにオブジェクトでDBの内容が入っている。下記URL参照。
        /*http://www.hiromedo.com/memo-to-log/?p=532*/
      }
//      echo $dbArr->shop_name;//$dbArrというオブジェクトからshop_nameを取り出している。
      /*表示ここまで*/

      return View('reservation.planadmin')->with('dbArr',$dbArr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
