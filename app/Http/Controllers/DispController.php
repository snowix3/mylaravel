<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DispController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $timeArr = array();
      $timeArr2 = array();
      $timeArr3 = array();
      $quantityArr = array();
      $quantityArr2 = array();
      $array = DB::select('select * from shop_reservation_disp_jonathans where id=1');
      //print_r($array);
      //var_dump(json_decode(json_encode($array), true));
      //$array = json_decode(json_encode($array), true);
      //var_dump((array)$array);
      $i=0;
      $j=0;
      $array = DB::select("show columns from shop_reservation_disp_jonathans");
      foreach ($array as $key) {
          $timeArr[$i] = $key;
          //print_r($quantityArr[$i]);

          foreach ($timeArr[$i] as $key2) {
              $timeArr2[$j] = $key2;
              if ($i>=4) {
                if ($j==0) {
                  //echo $quantityArr2[$j]."</br>";
                  $quantityArr[$i] = DB::table('shop_reservation_disp_jonathans')
                        ->lists($timeArr2[$j]);
                  foreach ($quantityArr[$i] as $key3) {
                      $quantityArr2[$i]=$key3;
                //      echo $quantityArr2[$i]."<br>";
                  }
                  $timeArr3[$i]=$timeArr2[0];
//                    echo $timeArr3[$i]."</br>";
//                    echo $quantityArr2[$i]."</br>";
//devブランチコミットテスト
//testブランチコミットテスト
//masterコミット
                }
              }
              $j++;
          }
          $j=0;
          $i++;
      }
//        echo $quantityArr2[7]."</br>";
      return view('reservation/disp')->with('timeArr3',$timeArr3)->with('quantityArr2',$quantityArr2);
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
}
