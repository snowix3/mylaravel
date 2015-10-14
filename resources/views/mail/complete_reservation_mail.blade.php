<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
              <?php
              echo $userName."様<br><br>";
              echo "予約の完了をご連絡致します。<br><br>";
              echo "ユーザーID : ".$userId."<br>";
              echo "予約日時 : ".$time."<br>";
              echo "予約プラン : ".$plan."<br>";
              ?>
            </div>
        </div>
    </body>
</html>
