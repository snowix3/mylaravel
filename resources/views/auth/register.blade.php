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

  <title>Register</title>

</head>

<body>
  <div class="container">
      <div class="content">

        <div class="title">Ragister</div>
        <br><br>

          <form method="POST" action="/auth/register">

            <table>
              <th>Name</th>
                <td>
                  <input type="text" name="name" value="{{ old('name') }}">
                </td><tr>
              <th>Email</th>
                <td>
                  <input type="email" name="email" value="{{ old('email') }}">
                </td><tr>
              <th>Password</th>
                <td>
                  <input type="password" name="password">
                </td><tr>
              <th>Confirm Password</th>
                <td>
                  <input type="password" name="password_confirmation">
                </td><tr>
            </table>

                <button type="submit">Register</button>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
      </div>
  </div>
</body>
</html>
