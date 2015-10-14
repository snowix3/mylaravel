<!DOCTIPE html>
<html>
<head>
  <meta charset="utf-8">
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

  <title>Login</title>

</head>

<body>
  <div class="container">
      <div class="content">

        <div class="title">秘密基地</div>
        <br><br>


        @if (Auth::guest())

            {{-- ログインしていない時 --}}

            <a href="/auth/login">Login</a>
            <a href="/auth/register">Register</a>

        @else
            {{-- ログインしている時 --}}

            {{ Auth::user()->name }}

            <a href="/auth/logout">Logout</a>

        @endif


      </div>
  </div>
</body>
</html>
