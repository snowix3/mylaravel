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
                <div class="title">DISP OK</div>
                <?php
                //  echo "クライアント時刻".date("Y-m-d H:i:s");//現在
                //  echo "<br>";
                  //$datetime = date("Y-m-d H:i:s");//クライアントの時刻が2015-09-28 14:07:02の形式で入ってる

                  $week = array("日", "月", "火", "水", "木", "金", "土");//曜日を表示するために文字を格納
                //  echo $week[date('w',strtotime($dbtime))]."曜日";
                  //echo date("m月");
                ?>
                <form action="../disp" method="post" accept-charset="UTF-8">

                  <table border="1">
                    <th colspan="8">本日から6日後まで予約できます。</th>
                    <tr></tr>
                    <th>-</th>
                    <th><?php echo $week[date('w',strtotime($dbtime))]; ?></th>
                    <th><?php echo $week[date('w',strtotime($dbtime.("+1 day")))]; ?></th>
                    <th><?php echo $week[date('w',strtotime($dbtime.("+2 day")))]; ?></th>
                    <th><?php echo $week[date('w',strtotime($dbtime.("+3 day")))]; ?></th>
                    <th><?php echo $week[date('w',strtotime($dbtime.("+4 day")))]; ?></th>
                    <th><?php echo $week[date('w',strtotime($dbtime.("+5 day")))]; ?></th>
                    <th><?php echo $week[date('w',strtotime($dbtime.("+6 day")))]; ?></th>
                    <tr></tr>
                    <td>-</td>
                    <td><?php echo date("m月d日");?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+1 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+2 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+3 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+4 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+5 day"));?></td>
                    <td><?php echo date("m月d日",strtotime($dbtime."+6 day"));?></td>
                    <tr></tr>
                    <td>00:00</td>
                    <?php
                    echo '<td name='.date('Y-m-d ', strtotime($dbtime))."00:00:00".'value='.date('Y-m-d ', strtotime($dbtime))."00:00:00".'>
                    <a href="#">'.date('Y-m-d ', strtotime($dbtime))."00:00:00".'</a></td>';
                    //ここに予約在庫数に問い合わせて、在庫数に対して幾つ予約があるかを問い合わせて差分を表示する。
                    ?>
                    <?php
                    echo '<td name='.date('Y-m-d ', strtotime($dbtime."+1 day"))."00:00:00".'value='.date('Y-m-d ', strtotime($dbtime."+1 day"))."00:00:00".'>
                    <a href="#">'.date('Y-m-d ', strtotime($dbtime."+1 day"))."00:00:00".'</a></td>';
                    ?>
                    <td>O</td>
                    <td>O</td>
                    <td>O</td>
                    <td>X</td>
                    <td>X</td>
                    <tr></tr>
                    <td>00:30</td>
                    <?php
                    echo '<td name='.date('Y-m-d ', strtotime($dbtime."+0 day"))."00:30:00".'value='.date('Y-m-d ', strtotime($dbtime."+0 day"))."00:30:00".'>
                    <a href="#">'.date('Y-m-d ', strtotime($dbtime."+0 day"))."00:30:00".'</a></td>';
                    ?>
                    <td>O</td>
                    <td>O</td>
                    <td>X</td>
                    <td>X</td>
                    <td>O</td>
                    <td>O</td>
                  </table>
                <p>予約追加</p>
                user_name<input type="text" name="user_name"></textarea><br>
                detail<input type="text" name="detail"></textarea><br>
                reservation_time<input type="text" name="reservation_time" value="<?php echo date("Y-m-d H:i:s");?>"></textarea><br>

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit">予約</button>
              </form>
              </br></br>
            </div>
        </div>
    </body>
</html>
