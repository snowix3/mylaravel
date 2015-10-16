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

              @if (Auth::guest())
                  {{-- ログインしていない時 --}}
                  <p>Hello Guest</p>

              @else
                  {{-- ログインしている時 --}}
                  <p>Hello {{ Auth::user()->name }}</p>
                  <p>Please take your time and relax!</p>

              @endif


                <div class="title">Laravel 5</div>
                <a href="test"><button value="test">TEST</button></a>
                <a href="test0"><button value="test0">TEST0</button></a>
                <a href="task"><button value="task">task</button></a>
                <a href="create"><button value="create">create</button></a>
                <a href="model"><button value="model">model</button></a>
                <a href="ajaxtest"><button value="ajaxtest">AJAX</button></a>
                <a href="shop"><button value="shop">Shop</button></a>
                <a href="disp"><button value="disp">Disp</button></a>
                <a href="cache"><button value="cache">Cache</button></a>
                <a href="planadmin"><button value="planadmin">planadmin</button></a>
                <a href="createUser"><button value="createUser">createUser</button></a>
                <a href="reservation"><button value="reservation">reservation</button></a>
                <a href="list"><button value="list">list</button></a>
                <a href="ajaxtest2"><button value="ajaxtest2">AJAX2</button></a>
                <a href="auth/register"><button value="register">register</button></a>
                <a href="auth/login"><button value="login">login</button></a>
                <a href="/auth/logout"><button value="logout">logout</button></a><br>

            </div>
        </div>
    </body>
</html>
