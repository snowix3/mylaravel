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
                    plan1_price<input type="number" name="plan1_price"><br>
                    plan1_name<input type="text" name="plan1_name"></textarea><br>
                    plan1_detail<input type="text" name="plan1_detail"></textarea><br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit">submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
