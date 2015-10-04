<!DOCTIPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<p><?php echo $name; ?></p>
<p><?php echo $userId; ?></p>
<p><?php echo $email; ?></p>
<p><?php echo $password; ?></p>
<p><?php echo $age; ?></p>
<form method="post" action="../insertUser" accept-charset="UTF-8">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
<button type="submit">登録</button>

</body>
</html>
