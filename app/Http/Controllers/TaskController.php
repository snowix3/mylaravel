<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        return View('tasks.task');
//        echo $user."aaaa";
/*
        DB::table('test1')->insert(
          ['id' => 3,'name' => 'Ayumu']
        );
        ->with('user',$user)
*/
//        DB::table('test1')->where('id', '=', 100)->delete();
        $user = DB::table('test1')->where('id', 333)->value('name');
        return View('tasks.task')->with('user',$user);
    }

//    public function show(Request $request)
      public function show($id)
    {
//      $id = $request->input('id');
      return 'Success show task/'.$id;
    }




}
