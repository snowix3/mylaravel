<!DOCTIPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <form method="post" action="../postUser" accept-charset="UTF-8">
      <label for="name">名前</label><br>
      <input type="text" name="name"><br>
      <label for="userId">ユーザーID</label><br>
      <input type="text" name="userId"><br>
      <label for="email">メールアドレス</label><br>
      <input type="email" name="email"><br>
      <label for="password">パスワード</label><br>
      <input type="password" name="password"><br>
      <label for="age">年齢</label><br>
      <input type="number" name="age"><br>

      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <button type="submit">submit</button>
  </form>

</body>
</html>
