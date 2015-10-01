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

            table, td{
            border:1px solid black;
            padding:0;
            }
            .tdlink a{
            height:100%;
            text-decoration: none;
            display:block;
            padding:5px;
            }
            .tdlink a:hover{
            color:white;
            background:rgb(185, 192, 194);
            }


        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">DISP OK</div>
                <?php
                if (isset($e)){
                  echo "<br>".$e;
                }
                //  echo "クライアント時刻".date("Y-m-d H:i:s");//現在
                //  echo "<br>";
                  //$datetime = date("Y-m-d H:i:s");//クライアントの時刻が2015-09-28 14:07:02の形式で入ってる

                  $week = array("E005","月", "火", "水", "木", "金", "土", "日");//曜日を表示するために文字を格納
                  //"mon"0, "tue"1, "wed"2, "thu"3, "fri"4, "sat"5, "sun"6 こっちにしたい
                  //"sun"0,"mon"1, "tue"2, "wed"3, "thu"4, "fri"5, "sat"6 本当はこっち
                  //echo $dbtime."<br>";
                  //echo $week[date('N',strtotime($dbtime))]."<br>";
                  //echo date('N',strtotime($dbtime))."<br>";
                ?>

                  <table border="1" class="tdlink">
                    <th colspan="8">本日から6日後まで予約できます。</th>
                    <tr></tr>
                    <!--１行目に曜日を表示する。取得した$dbtimeを元に曜日を数値で出して、配列の文字列に置き換えて表示。-->
                    <th>---</th>
                    <th><?php echo $week[date('N',strtotime($dbtime))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+1 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+2 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+3 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+4 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+5 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+6 day")))]; ?></th>
                    <tr></tr>
                    <!--２行目には$dbtimeを元に当日含め１週間、６日後までを表示する。-->
                    <td></td>
                    <td><?php echo date("m月d日");?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+1 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+2 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+3 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+4 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+5 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+6 day"));?></td>
                    <tr></tr>

                    <?php
                    $hour=0;
                    $min=0;
                    $c=0;
                    //1.同じ日時の予約在庫数に問い合わせて設定を確認し、予約情報に問い合わせて差分がいくつあるかを表示する。
                    //2.同じ場所からaタグクリックで予約追加もする。
                    //3.現在時刻以前と＋２時間後までを予約不可能にする。
                    for ($n=0; $n < 48 ; $n++) {
                      echo '<td align="right">'.sprintf('%02d', $hour).":".sprintf('%02d', $min).'</td>';//テーブル左端の時刻作成
                      for ($i=0; $i < 7 ; $i++) {
                        /*このaタグを押すと同じ$cの値のformが押される。各マスごとの時間が所定の形式でコントローラーに送られ、DBに入る。*/

                        $admin=0;//1なら管理者画面で表示。
                        if ($admin==1) {
                          $ac = $a[$c];
                        }else {
                          $ac = "";
                        }
                        //在庫数が０なら弾く'.$a[$c].'
                        if ($a[$c]>0) {
                          echo '<td  align="center">'.$ac.'<a href="../disp" onclick="document.form'.$c.'.submit();return false;">O</a></td>';
                          echo '
                          <form name="form'.$c.'" method="post" action="../disp" accept-charset="UTF-8">
                            <input type="hidden" name="reservation_time" value="'.date('Y-m-d ', strtotime($dbtime."+$i day"))."$hour:$min:00".'">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                          </form>
                          ';
                        }else {
                          echo '<td  align="center">'.$ac.'<a href="#" onclick="document.form'.$c.'.submit();return false;">X</a></td>';
                        }
                        $c++;
                      }
                      echo "<tr></tr>";
                      if($min==0){//時刻を３０分ずつずらす。
                          $min=30;
                      }else{//1時間増やす
                          $min=0;
                          $hour++;
                      }
                    }
                    ?>
                    <?php
//                    echo '<td name='.date('Y-m-d ', strtotime($dbtime))."00:00:00".'value='.date('Y-m-d ', strtotime($dbtime))."00:00:00".'>
//                    <a href="#">'.date('Y-m-d ', strtotime($dbtime))."99:99:99".'</a></td>';
                    //ここに予約在庫数に問い合わせて、在庫数に対して幾つ予約があるかを問い合わせて差分を表示する。
                    //同じ場所からaタグクリックで予約追加もする。
                    ?>

                  </table>
              </br>
<!--
              <a href="../disp" onclick="document.form1.submit();return false;">aタグアクションテスト</a>
              <form name="form1" method="post" action="../disp" accept-charset="UTF-8">
                user_name<input type="text" name="user_name"></textarea><br>
                detail<input type="text" name="detail"></textarea><br>
                reservation_time<input type="text" name="reservation_time" value="<?php //echo date("Y-m-d H:i:s");?>"></textarea><br>
                <input type="hidden" name="_token" value="<?php //echo csrf_token(); ?>">
              </form>
              </br>

              <p>予約追加テスト</p>
              <form action="../disp" method="post" accept-charset="UTF-8">
                user_name<input type="text" name="user_name"></textarea><br>
                detail<input type="text" name="detail"></textarea><br>
                reservation_time<input type="text" name="reservation_time" value="<?php //echo date("Y-m-d H:i:s");?>"></textarea><br>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit">予約</button>
              </form>
-->
              </br>
            </div>
        </div>
    </body>
</html>
