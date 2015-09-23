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
                    $date = array("月","火","水","木","金","土","日");
                    echo '<table border="1">';
                    foreach ($quantityArr2 as $key => $value) {
//                        echo $key.":".$value."<br>";
if ($i==0) {
    echo '<td>'.$date[$j].'</td>';
    $j++;
}
                        echo '<td><input type="number" name='.$timeArr3[$key].' value='.$value.' width="10"></td>';
                        if ($i==47) {
                            echo "<tr></tr>";
                            $i=-1;
                        }
                        $i++;

                    }
                    echo "</table>";

                }
                ?>
                <form method="post" action="../shop" accept-charset="UTF-8">
                    <label for="time">日時ごとに予約可能な数を入力し格納します。</label><br>

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

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit">submit</button>
                </form>
              </br></br></br></br>
            </div>
        </div>
    </body>
</html>
