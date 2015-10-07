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
                  $week = array("E005","月", "火", "水", "木", "金", "土", "日");//曜日を表示するために文字を格納
                ?>

                  <table border="1" class="tdlink">
                    <th colspan="8">本日から6日後まで予約できます。当日は２時間後以降のみ可能です。</th>
                    <tr></tr>
                    <!--１行目に曜日を表示する。取得した$dbtimeを元に曜日を数値で出して、配列の文字列に置き換えて表示。-->
                    <th>---</th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+0 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+1 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+2 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+3 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+4 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+5 day")))]; ?></th>
                    <th><?php echo $week[date('N',strtotime($dbtime.("+6 day")))]; ?></th>
                    <tr></tr>
                    <!--２行目には$dbtimeを元に当日含め１週間、６日後までを表示する。-->
                    <td></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+0 day"));?></td>
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
                    $admin=1;//1なら管理者画面で表示。
                    if ($admin==1) {
                      echo "adminモード";
                    }else {
                      echo "user モード";
                    }
                    //今回やってることは・・・
                    //1.同じ日時の予約在庫数に問い合わせて設定を確認し、予約情報に問い合わせて差分がいくつあるかを表示する。
                    //2.同じ場所からaタグクリックで予約追加もする。
                    //3.現在時刻以前と＋２時間後までを予約不可能にする。
                    for ($n=0; $n < 48 ; $n++) {
                      echo '<td align="right">'.sprintf('%02d', $hour).":".sprintf('%02d', $min).'</td>';//テーブル左端の時刻作成
                      for ($i=0; $i < 7 ; $i++) {
                        /*このaタグを押すと同じ$cの値のformが押される。各マスごとの時間が所定の形式でコントローラーに送られ、DBに入る。*/

                        if ($admin==1) {
                          $ac = $a[$c];
                        }else {
                          $ac = "";
                        }
                        //当日の現在時刻＋２時間以前の予約を取れないようにする。
                        if ($hour < date('H', strtotime($dbtime."+2 hour")) && $i==0){
                          //date('H', strtotime($dbtime."+2 hour"))
                          echo '<td  align="center">'.$ac.'<a href="#" onclick="document.form'.$c.'.submit();return false;">---</a></td>';
                        }else{
                          //２２時すぎると全部とれてしまうエブリデイ２２時問題の解決。二時間すぎた時刻が翌日ならば当日は予約不可を表示。
                          if (date('d', strtotime($dbtime."+0 hour")) < date('d', strtotime($dbtime."+2 hour")) && $i==0){
                            echo '<td  align="center">'.$ac.'<a href="#" onclick="document.form'.$c.'.submit();return false;">---</a></td>';
                          }else{
                            //在庫数が０ならXを表示して、予約できないようにする。在庫があればマルを表示してクリックで予約できる。
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
                          }
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
                  </table>
              </br>
              </br>
            </div>
        </div>
    </body>
</html>
