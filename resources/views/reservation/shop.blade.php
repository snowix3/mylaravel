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
                    $kcount=0;
                    $count=0;
                    for ($j=0; $j < 48 ; $j++) {
                      for ($k=0; $k < 7 ; $k++) {
                        /*if ($count==0) {
                          $time[$count]=($jcount)*48+$kcount;
                          echo "000:".$time[$count];
                          echo "<br>";
                          //$jcount++;
                          $count++;
                        }else {*/
                          $time[$count]=($jcount)*48+$kcount;
                          //echo $time[$count];
                          //echo "<br>";
                          $count++;
                          $jcount++;
                        //}
                      }
                      $kcount++;
                      $jcount=0;
                      /*if ($j%48==0) {
                        $time[$jcount]=$j;
                        echo "48倍".$time[$jcount];
                        echo "<br>";
                        $jcount++;
                      }*/
                    }

                    //print_r($time);
                    //echo "string<br>";
                    //var_dump($time);
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
                    $count=0;
                    //echo "time=".$timeArr4[$time[$count]].'value='.$quantityArr2value[$time[$count]];
                    for ($i=0; $i < $len ; $i++) {
                      if ($i%7==0) {//７件づつ改行
                        if ($i!=0) {
                          echo '<tr></tr>';
                        }
                      }
                      if ($i%7==0) {//７件づつ時刻表示
                        echo '<td align="right">'.$hour.":".$min.'</td>';//テーブル左端の時刻作成
                        if ($min==0) {
                            $min=30;
                        }else {
                            $min=0;
                            $hour++;
                        }
                      }
                      echo '<td><input type="number" name='.$timeArr4[$time[$count]].' value='.$quantityArr2value[$time[$count]].' class="sample4"></td>';
                      $count++;
                    }
                    echo "</table>";
                    echo '
                        <input type="hidden" name="_token" value="'.csrf_token().'">
                        <button type="submit">submit</button>
                    </form>';
                }
                ?>
              </br></br></br></br>
            </div>
        </div>
    </body>
</html>
