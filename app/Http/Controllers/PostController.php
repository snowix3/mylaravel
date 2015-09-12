<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
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

    public function create(){
        return View('posts.create');
    }

    function store(Request $request){
      /*
        DB::table('posts')->insert([
        'title'=>Input::get('title'),
        'body'=>Input::get('body')
        ]);*/
        $id = $request->input('title');
        $name = $request->input('body');
        DB::table('test1')->insert(
          ['id' => $id, 'name' => $name]
        );
        return 'Successfully done!';
    }


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
