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
                <div class="title">tasks OK</div>
                <?php echo $user ?>
                <a href="task/1"><p>task show1</p></a>
                <a href="task/2"><p>task show2</p></a>
                <?php echo "echotest"; ?>
                <form method="get" action="task" accept-charset="UTF-8">
                    <label for="title">数値入力</label><br>
                    <input type="number" name="id"><br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit">submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
