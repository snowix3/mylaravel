<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            input.sample4{
            width:30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">SHOP OK</div>
                <a href="shop"><button value="shop">リロード</button></a><br>
                <?php
                if (isset($timeArr3)){
                    //foreach ($timeArr3 as $key => $value) {
                    //    echo $key.":".$value."<br>";
                    //}
                    $i=0;
                    $j=0;
                    $hour=0;
                    $min=0;
                    $date = array("月","火","水","木","金","土","日");//曜日表示のための配列
                    $time = array();//時刻表示で並び替えをするための配列
                    $jn = 0;
                    for ($j=0; $j < 48 ; $j++) {
                      for ($n=0; $n < 7 ; $n++) {
                        $jn++;
                        $time[$jn]=$jn;
                      //echo $time[$jn];
                      }
                      //echo "<br>";
                    }
                    $jcount=0;
                    for ($j=0; $j < 336 ; $j++) {
                      $time[$jcount]=$j*$jcount;
                      echo ":".$time[$jcount];
                      echo "<br>";
                      $jcount++;
                      /*if ($j%48==0) {
                        $time[$jcount]=$j;
                        echo "48倍".$time[$jcount];
                        echo "<br>";
                        $jcount++;
                      }*/
                    }
                    print_r($time);
                    echo '
                    <label for="time">店舗に予約可能な回数を入力し、設定を保存します。</label><br>
                    <form method="post" action="../shop" accept-charset="UTF-8">
                    ';
                    echo '<table align="center" border="1">';
                    echo '<th>'."-".'</th>';//１行目始まり（テーブルヘッダー）

                    for ($k=0; $k < 7; $k++) {//テーブルヘッダー作成を繰り返す
                        echo '<th>'.$date[$k].'</th>';
                        //echo '<td>'.$j."日後".'</td>';
                    }
                    echo '<tr></tr>';//１行目終わり

                    $timeArr4 = array();
                    $quantityArr2value = array();
                    foreach ($quantityArr2 as $key => $value) {
                        $timeArr4[$i] = $timeArr3[$key];
                        $quantityArr2value[$i] = $value;
                        //echo '<td><input type="number" name='.$timeArr3[$key].' value='.$value.' class="sample4"></td>';
                        $i++;
                    }
                    $len = count($quantityArr2value);
                    $a = $len/7;
                    for ($i=0; $i < $a ; $i++) {
                      if ($i%7==0) {//７件づつ改行
                        if ($i!=0) {
                          echo '<tr></tr>';
                        }
                      }
                      if ($i%7==0) {//７件づつ時刻表示
                        echo '<td align="right">'.$hour.":".$min.'</td>';
                        if ($min==0) {
                            $min=30;
                        }else {
                            $min=0;
                            $hour++;
                        }
                        /*
                        echo '<td>'.$hour.":".$min.'</td>';//テーブルヘッダーの時刻を作成・表示
                        if ($min==0) {
                            $min=30;
                        }else {
                            $min=0;
                            $hour++;
                        }
                        */
                      }
                      echo '<td><input type="number" name='.$timeArr4[$i].' value='.$quantityArr2value[$i].' class="sample4"></td>';
                    }
                    echo "</table>";
                    echo '
                        <input type="hidden" name="_token" value="'.csrf_token().'">
                        <button type="submit">submit</button>
                    </form>';
                }
                ?>
<!--
                    <table border="1">

                      <tr>
                        <td>-</td><td>月</td><td>火</td><td>水</td><td>木</td><td>金</td><td>土</td><td>日</td>
                      </tr>
                      <tr>
                        <td>00:00</td>
                        <td><input type="number" name="mon_00_00" width="10"></td>
                        <td><input type="number" name="tue_00_00" width="10"></td>
                        <td><input type="number" name="wed_00_00" width="10"></td>
                        <td><input type="number" name="thu_00_00" width="10"></td>
                        <td><input type="number" name="fri_00_00" width="10"></td>
                        <td><input type="number" name="sat_00_00" width="10"></td>
                        <td><input type="number" name="sun_00_00" width="10"></td>
                      </tr>
                      <tr>
                        <td>00:30</td>
                        <td><input type="number" name="mon_00_30" width="10"></td>
                        <td><input type="number" name="tue_00_30" width="10"></td>
                        <td><input type="number" name="wed_00_30" width="10"></td>
                        <td><input type="number" name="thu_00_30" width="10"></td>
                        <td><input type="number" name="fri_00_30" width="10"></td>
                        <td><input type="number" name="sat_00_30" width="10"></td>
                        <td><input type="number" name="sun_00_30" width="10"></td>
                      </tr>
                      <tr>
                        <td>01:00</td>
                        <td><input type="number" name="mon_01_00" width="10"></td>
                        <td><input type="number" name="tue_01_00" width="10"></td>
                        <td><input type="number" name="wed_01_00" width="10"></td>
                        <td><input type="number" name="thu_01_00" width="10"></td>
                        <td><input type="number" name="fri_01_00" width="10"></td>
                        <td><input type="number" name="sat_01_00" width="10"></td>
                        <td><input type="number" name="sun_01_00" width="10"></td>
                      </tr>
                      <tr>
                        <td>01:30</td>
                      </tr>
                      <tr>
                        <td>02:00</td>
                      </tr>
                      <tr>
                        <td>02:30</td>
                      </tr>
                      <tr>
                        <td>03:00</td>
                      </tr>
                      <tr>
                        <td>03:30</td>
                      </tr>
                      <tr>
                        <td>04:00</td>
                      </tr>
                      <tr>
                        <td>04:30</td>
                      </tr>
                      <tr>
                        <td>05:00</td>
                      </tr>
                      <tr>
                        <td>05:30</td>
                      </tr>
                      <tr>
                        <td>06:00</td>
                      </tr>
                      <tr>
                        <td>06:30</td>
                      </tr>
                      <tr>
                        <td>07:00</td>
                      </tr>
                      <tr>
                        <td>07:30</td>
                      </tr>
                      <tr>
                        <td>08:00</td>
                      </tr>
                      <tr>
                        <td>08:30</td>
                      </tr>
                      <tr>
                        <td>09:00</td>
                      </tr>
                      <tr>
                        <td>09:30</td>
                      </tr>
                      <tr>
                        <td>10:00</td>
                      </tr>
                      <tr>
                        <td>10:30</td>
                      </tr>
                      <tr>
                        <td>11:00</td>
                      </tr>
                      <tr>
                        <td>11:30</td>
                      </tr>
                      <tr>
                        <td>12:00</td>
                      </tr>
                      <tr>
                        <td>12:30</td>
                      </tr>
                      <tr>
                        <td>13:00</td>
                      </tr>
                      <tr>
                        <td>13:30</td>
                      </tr>
                      <tr>
                        <td>14:00</td>
                      </tr>
                      <tr>
                        <td>14:30</td>
                      </tr>
                      <tr>
                        <td>15:00</td>
                      </tr>
                      <tr>
                        <td>15:30</td>
                      </tr>
                      <tr>
                        <td>16:00</td>
                      </tr>
                      <tr>
                        <td>16:30</td>
                      </tr>
                      <tr>
                        <td>17:00</td>
                      </tr>
                      <tr>
                        <td>17:30</td>
                      </tr>
                      <tr>
                        <td>18:00</td>
                      </tr>
                      <tr>
                        <td>18:30</td>
                      </tr>
                      <tr>
                        <td>19:00</td>
                      </tr>
                      <tr>
                        <td>19:30</td>
                      </tr>
                      <tr>
                        <td>20:00</td>
                      </tr>
                      <tr>
                        <td>20:30</td>
                      </tr>
                      <tr>
                        <td>21:00</td>
                      </tr>
                      <tr>
                        <td>21:30</td>
                      </tr>
                      <tr>
                        <td>22:00</td>
                      </tr>
                      <tr>
                        <td>22:30</td>
                      </tr>
                      <tr>
                        <td>23:00</td>
                      </tr>
                      <tr>
                        <td>23:30</td>
                      </tr>
                      </tr>
                    </table>
-->

              </br></br></br></br>
            </div>
        </div>
    </body>
</html>
