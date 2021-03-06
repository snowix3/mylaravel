<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;
class PostUserController extends Controller
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
    public function show(Request $request)
    {
      $name = $request->input('name');
      $userId = $request->input('userId');
      $email = $request->input('email');
      $password = $request->input('password');
      $age = $request->input('age');
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

    public function postUser(Request $request)
    {
      $name = $request->input('name');
      $userId = $request->input('userId');
      $email = $request->input('email');
      $password = $request->input('password');
      $age = $request->input('age');
      Cache::put('name', $name, 10);
      Cache::put('userId', $userId, 10);
      Cache::put('email', $email, 10);
      Cache::put('password', $password, 10);
      Cache::put('age', $age, 10);

      return view('conformationUser',compact('name','userId','email','password','age'));

    }
}
