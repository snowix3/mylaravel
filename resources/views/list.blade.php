<!DOCTIPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <h1>予約履歴を表示します</h1>
  <ul>
  @foreach($lists as $list)
  <li>shop_name:{{$list->shop_name}}</li>
  <li>user_name:{{$list->user_name}}</li>
  <li>reservation_time:{{$list->reservation_time}}</li>
  <li>amount:{{$list->amount}}</li>
  <li>plan:{{$list->plan}}</li>
  <li>head_count:{{$list->head_count}}</li>
  <li>detail:{{$list->detail}}</li>
  <li>staff:{{$list->staff}}</li>
  <li>point:{{$list->point}}</li><br>
  @endforeach
  </ul>
</body>
</html>
