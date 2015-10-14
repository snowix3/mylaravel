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

        <div class="title">Login</div>
        <br><br>

          <form method="POST" action="/auth/login">

            <table>
              <th>Email</th>
                <td>
                    <input type="email" name="email" value="{{ old('email') }}">
                </td><tr>
              <th>Password</th>
                <td>
                  <input type="password" name="password" id="password">
                </td><tr>
            </table>

            <button type="submit">Login</button>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </form>

      </div>
  </div>
</body>
</html>
