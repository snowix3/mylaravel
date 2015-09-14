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
                <div class="title">MODEL TEST OK</div>
            </div>
        </div>

        <form method="post" action="../model">
            <label for="title">title</label><br>
            <input type="number" name="title"><br>
            <label for="body">body</label><br>
            <input type="text" name="body"></textarea><br>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit">submit</button>
        </form>
        <!--配列またはJSONの中身を表示-->
        <?php
        $array = json_decode( $Model_Test) ;
          print_r($array);
//        echo $array[0];
        ?>

<!--
        @foreach($Model_Test->all() as $Model_Test)
             <li></li>
        @endforeach
-->
        <!--
            @if ($Model_Test)
                <div class="alert alert-danger">
                    <ul>
                            <li>{{ $Model_Test }}</li>
                    </ul>
                </div>
            @endif
        -->



    </body>
</html>
