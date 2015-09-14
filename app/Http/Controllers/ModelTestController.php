<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Model_Test;//レストフルコントローラーの実装のためには、Modelを指定しインポートする　use DB;もいらない
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModelTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $title = $request->input('title');
      $body = $request->input('body');
      Model_Test::insert(['id' => $title]);//submitされたらORM(ORマッピング)でテーブルにデータを追加している。
//      $Model_Test = Model_Test::all();//modelを使ってるのでDB::という記述なしでいける。ORMでテーブルの情報を全取得してる。
      $Model_Test = Model_Test::all()->toArray();//モデルの全コレクションを配列に変換(失敗)
      $Model_Test = Model_Test::all()->toJson();//モデルの全コレクションをJSONに変換(成功)
//      return view('modeltest', ['Model_Test' => $Model_Test]);//テーブル内の情報をビューに送って表示
	      return view('modeltest')->with('Model_Test',$Model_Test);
//        return $Model_Test;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $Model_Test = Model_Test::all();//modelを使ってるのでDB::という記述なしでいける
        return view('modeltest', ['Model_Test' => $Model_Test]);
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
        $Model_Test = Article::find($id);
    }
}
