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
    }

    public function show()
    {

      $user = DB::table('test1')->where('id', 3)->value('name');
//        echo $user."aaaa";
/*
        DB::table('test1')->insert(
          ['id' => 3,'name' => 'Ayumu']
        );
        ->with('user',$user)
*/
//        DB::table('test1')->where('id', '=', 100)->delete();
        return View('tasks.task')->with('user',$user);
    }




}
