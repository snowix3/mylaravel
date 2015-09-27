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
                /*コントローラーから配列を受け取って曜日と時間ごとの設定画面を表示させる*/
                if (isset($timeArr3)){//$timeArr3の配列が存在しているなら実行。なければエラーE001を表示
                    //$j=0;
                    $hour=0;
                    $min=0;
                    $date = array("月","火","水","木","金","土","日");//曜日表示のための配列
                    $time = array();//時刻表示で並び替えをするための配列

                    /*配列$timeに0~335の数字を順番にいれただけ。（必要なし）
                    $jn = 0;
                    for ($j=0; $j < 48 ; $j++) {
                      for ($n=0; $n < 7 ; $n++) {
                        $jn++;
                        $time[$jn]=$jn;
                      }
                    }*/

                    /*配列$timeに0~335の数字を並べかえていれる。
                      並べ替える理由は、テーブルに表示するときにデータが横にならんでしまい横に長くなるため。
                      配列には0,48,96,144,192,240,288,1,49,97...という形で格納するだけ。ここでは利用しない。*/
                    $jcount=0;
                    $kcount=0;
                    $count=0;
                    for ($j=0; $j < 48 ; $j++) {
                      for ($k=0; $k < 7 ; $k++) {
                          $time[$count]=($jcount)*48+$kcount;
                          $count++;
                          $jcount++;
                      }
                      $kcount++;
                      $jcount=0;//初期化
                    }

                    /*フォーム・テーブル・テーブルヘッダー部分までの作成*/
                    echo '
                    <label>曜日と時間ごとに店舗へ予約可能な回数を入力し、設定を保存します。</label><br>
                    <form method="post" action="../shop" accept-charset="UTF-8">
                    ';
                    echo '<table align="center" border="1">';
                    echo '<th>'."時刻".'</th>';//１行目始まり（テーブルヘッダー）

                    for ($k=0; $k < 7; $k++) {//テーブルヘッダー作成を繰り返す
                        echo '<th>'.$date[$k].'</th>';
                    }
                    echo '<tr></tr>';//１行目終わり

                    /*コントローラーから受け取った連想配列（日時と予約在庫数）を、それぞれ通常の配列に入れ直している。*/
                    $timeArr4 = array();
                    $i=0;
                    $quantityArr2value = array();
                    foreach ($quantityArr2 as $key => $value) {
                        $timeArr4[$i] = $timeArr3[$key];
                        $quantityArr2value[$i] = $value;
                        $i++;
                    }

                    /*テーブルを作成する。各テーブルのnameに日時を入れ、valueには予約在庫数を表示させる。
                    nameには "mon_00_00"という形式で値が入る。*/
                    $len = count($quantityArr2value);//336
                    $a = $len/7;//48
                    $count=0;//再利用なので初期化
                    for ($i=0; $i < $len ; $i++) {
                      if ($i%7==0) {//７件づつ改行
                        if ($i!=0) {
                          echo '<tr></tr>';
                        }
                      }
                      if ($i%7==0) {//７件づつ時刻表示。３０分ごとに表示する。sprintf('%02d', $hour)はゼロ埋め
                        echo '<td align="right">'.sprintf('%02d', $hour).":".sprintf('%02d', $min).'</td>';//テーブル左端の時刻作成
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
                        <p>変更した設定を保存する</p><button type="submit">確定</button>
                    </form>';
                }else {
                  echo "E001:配列が存在していません。作成依頼してください。";
                }
                ?>
              </br></br></br></br>
              <p>レストフルルーティング CREATE：データベースに店舗を追加（新規レコード作成）</p>
              <form action="../shop/create" method="GET" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit">爆発</button>
              </form>
              </br></br>

              <p>レストフルルーティング SHOW：</p>
              <form action="../shop" method="GET" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit">確定</button>
              </form>
              </br></br>

              <p>レストフルルーティング edit:</p>
              <form action="../shop/{shop}/edit" method="GET" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit">確定</button>
              </form>
              </br></br>

              <p>レストフルルーティング delete:</p>
              <form action="../shop/{shop}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit">確定</button>
              </form>

              <p>レストフルルーティング put:</p>
              <form action="../shop/{shop}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit">確定</button>
              </form>

            </div>
        </div>
    </body>
</html>
