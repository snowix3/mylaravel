<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Mail;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    //プラン一覧表示メソッド
    public function index()

    {
      //DBの値を変数に格納
         $plan = DB::table('shop_plan')->get();
         
        return view('reservation/cache')->with('plan',$plan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    //メール送信メソッド
    public function create()
    {
      $user_name = Cache::get('user_name');
      $plan_select = Cache::get('plan_select');
      $mail_domein = '@gmail.com';

      $email = $user_name. $mail_domein;
      echo $email.'にメールを送りました。';

      $mail_text = $plan_select.'を予約しました';

      //メール送信
      Mail::raw($mail_text, function($message) use($email)
      {
       $message->to($email) ->subject('test');
     });

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    //確認画面表示メソッド
    public function store(Request $request)
    {
      $user_name = $request->input('user_name');
      $plan_select = $request->input('plan_select');
      Cache::put('user_name', $user_name, 30);
      Cache::put('plan_select', $plan_select, 30);

        return view('reservation/cache');


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
