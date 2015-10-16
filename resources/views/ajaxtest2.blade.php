<!DOCTYPE html>
<html>
    <head>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
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

        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript">
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: "POST",
            url: "posts",
            dataType: 'json',
            data: { // 送信データを指定(getの場合は自動的にurlの後ろにクエリとして付加される)
              request1: 111,
              request2: 222
            },
            success: function(date){
                console.log("post ok");
                console.log(date);
            },
            error: function() {
                alert("post err");
            }
        });
        $.ajax({
            type: 'GET',
            url: 'posts',
            data: {
                id: 1,
                mode: 'hoge',
                type: 'entry'
            },
            success: function(date){
                console.log("get ok");
                console.log(date);
            },
            error: function() {
                alert("get err");
            }
        });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">AJAX OK</div>


                <div id="disp">this is disp DOM</div>
            </div>
        </div>
    </body>
</html>
