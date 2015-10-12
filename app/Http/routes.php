<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/test', function () {
    return view('test');
});
*/

Route::get('test', function(){
    $name = 'uiiiiiiiiiiii';
    return View::make('subdir.test')->with('name',$name);
});
// with()というMethodで$name変数を’name'という名前を付けて送っている。
// with(データの名前, 送るデータ)
// viewsにあるsubdirというディレクトリの指定方法

Route::get('test0', 'TestController@show');

Route::get('create', function () {
    return view('posts/create');
});

Route::get('ajaxtest', function () {
    return view('ajaxtest');
});


Route::resource('shop', 'ShopController');//RESTfulな書き方。これ１行で全部まかなえる。
Route::resource('disp', 'DispController');//RESTfulな書き方。これ１行で全部まかなえる。
Route::resource('cache', 'CacheController');//RESTfulな書き方。これ１行で全部まかなえる。
Route::resource('planadmin', 'PlanadminController');//RESTfulな書き方。これ１行で全部まかなえる。
Route::resource('reservation', 'ReservationController');//RESTfulコントローラー
Route::resource('list', 'ListController');//RESTfulコントローラー

Route::get('createUser', function () {
    return view('createUser');
});

//Route::post('postUser', 'PostUserController@postUser');
//新規登録画面から確認画面にデータを送る
Route::post('postUser', 'PostUserController@postUser');

//新規登録確認画面からDBにデータをいれて完了に行く
Route::post('insertUser', 'insertUserController@insert');


// 実際にDBにデータを入れる
Route::post('posts', 'PostController@store');

Route::resource('task', 'TaskController');//RESTfulな書き方。これ１行で全部まかなえる。

// modeltest
Route::get('model', 'ModelTestController@show');
Route::post('model', 'ModelTestController@store');


Route::get('posts/create', ['middleware' => 'old', function()
{
    return ('PostController@store');
}]);
// 投稿formを表示する
//Route::get('posts/create', 'PostController@create');



//
