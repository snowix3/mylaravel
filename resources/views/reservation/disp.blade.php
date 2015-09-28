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
                  $time = date("西暦Y年n月j日　Ah:i");
                  print($time);
                  echo "<br>";
                  echo date("Y-m-d H:i:s");//現在
                  echo "<br>";
                  echo date("Y-m-d H:i:s",strtotime("+1 day"));//1日後
                  echo "<br>";
                  echo date("Y-m-d H:i:s",strtotime("+2 day"));//2日後
                  echo "<br>";

                  $datetime = date("Y-m-d H:i:s");//2015-09-28 14:07:02の形式で入ってる
                  $week = array("日", "月", "火", "水", "木", "金", "土");//曜日を表示するために文字を格納
                  echo $week[date('w',strtotime($datetime))]."曜日";
                  //echo date("m月");
                ?>
                <table border="1">
                  <th colspan="8">本日から6日後まで予約できます。</th>
                  <tr></tr>
                  <th>曜日</th>
                  <th><?php echo $week[date('w',strtotime($datetime))]; ?></th>
                  <th><?php echo $week[date('w',strtotime($datetime.("+1 day")))]; ?></th>
                  <th><?php echo $week[date('w',strtotime($datetime.("+2 day")))]; ?></th>
                  <th><?php echo $week[date('w',strtotime($datetime.("+3 day")))]; ?></th>
                  <th><?php echo $week[date('w',strtotime($datetime.("+4 day")))]; ?></th>
                  <th><?php echo $week[date('w',strtotime($datetime.("+5 day")))]; ?></th>
                  <th><?php echo $week[date('w',strtotime($datetime.("+6 day")))]; ?></th>

                  <tr></tr>
                  <td>日時</td>
                  <td><?php echo date("d日");?></td>
                  <td><?php echo date("d日",strtotime("+1 day"));?></td>
                  <td><?php echo date("d日",strtotime("+2 day"));?></td>
                  <td><?php echo date("d日",strtotime("+3 day"));?></td>
                  <td><?php echo date("d日",strtotime("+4 day"));?></td>
                  <td><?php echo date("d日",strtotime("+5 day"));?></td>
                  <td><?php echo date("d日",strtotime("+6 day"));?></td>

                  <tr></tr>
                  <td>0:00</td><td>2-2</td><td>2-3</td>
                  <tr></tr>
                  <td>0:30</td><td>3-2</td><td>3-3</td>
                </table>
              <p>予約追加</p>
              <form action="../disp" method="post" accept-charset="UTF-8">
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
