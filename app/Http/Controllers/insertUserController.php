<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class insertUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        //
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

    public function insert()
    {
      //$name = Cache::get('name');
      //$userId = Cache::get('userId');
      //$email = Cache::get('email');
      //$password = Cache::get('password');
      //$age = Cache::get('age');
      DB::insert('insert into shop_user_info_jonathans (user_name,user_id,email,password,age) values (?,?,?,?,?)',
      [Cache::get("name"),Cache::get('userId'),Cache::get('email'),Cache::get('password'),Cache::get('age')]);
      //指定したIDのレコードを作成する。shop_nameも指定すること。
      return 'insert Successfully done!<br><a href="../">TOP</a>';


    }



}
