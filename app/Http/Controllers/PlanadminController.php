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
      echo "index success";
      return View('reservation.planadmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      echo "create success";
      return View('reservation.planadmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $plan1_name = $request->input('plan1_name');
      $plan1_detail = $request->input('plan1_detail');
      $plan1_price = $request->input('plan1_price');
      DB::table('shop_plan_jonathans')->insert([
      'id' => 1 ,
      'shop_name' => 'jonathans',
      'plan1_name' => $plan1_name,
      'plan1_detail' => $plan1_detail,
      'plan1_price' => $plan1_price]);
      return View('reservation.planadmin');}

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
