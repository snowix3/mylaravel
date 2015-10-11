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
                <div class="title">plan admin</div>
                <form method="post" action="../planadmin">
                <?php
                if (isset($dbArr)){
                  for ($i=1; $i < 6; $i++) {
                    $price="plan".$i."_price";
                    $name="plan".$i."_name";
                    $detail="plan".$i."_detail";

                    echo "<table align='center'>";

                    echo '<td>プラン'.$i.'料金<input type="number" name="plan'.$i.'_price" value='.$dbArr->$price.'>
                    <tr><td>プラン'.$i.'名前<input type="text" name="plan'.$i.'_name" value='.$dbArr->$name.'></textarea>
                    <tr><td>プラン'.$i.'詳細<input type="text" name="plan'.$i.'_detail" value='.$dbArr->$detail.'></textarea><tr>
                    ';
                    echo "</table>";
                  }
                  echo '<input type="hidden" name="_token" value="'.csrf_token().'">
                  <button type="submit">ショッププラン更新</button>';
                }else {
                  echo "配列が存在しません。作成してください。";
                 }
                ?>

                </form>
                <br>
                <p>CREATE：データベースに店舗プランを追加（新規レコード作成）</p>
                <form action="../planadmin/create" method="GET" accept-charset="UTF-8">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <button type="submit">確定</button>
                </form>
            </div>
        </div>
    </body>
</html>
