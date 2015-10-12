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

            table, td{
            border:1px solid black;
            padding:0;
            }
            .tdlink a{
            height:100%;
            text-decoration: none;
            display:block;
            padding:5px;
            }
            .tdlink a:hover{
            color:white;
            background:rgb(185, 192, 194);
            }


        </style>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div id="reservation">


                <h1>プラン選択画面</h1>
                <?php
                if (isset($planArr)){
                  for ($i=1; $i < 6; $i++) {
                    $price="plan".$i."_price";
                    $name="plan".$i."_name";
                    $detail="plan".$i."_detail";

                    echo "<div align='left'>";

                    echo '
                    プラン'.$i.'<br>
                    ¥'.$planArr->$price.'-<br>
                    '.$planArr->$name.'<br>
                    '.$planArr->$detail.'<br><br>
                    ';
                    echo '
                    ';
                    echo "</div>";
                  }?>

                  <p>プラン選択</p>
                  <form name="reservationform1">
                    <select name="plan" onChange="page1()">
                      <option value="">プランを選択して日時予約へ</option>
                      <option value="プラン1">プラン1</option>
                      <option value="プラン2">プラン2</option>
                      <option value="プラン3">プラン3</option>
                      <option value="プラン4">プラン4</option>
                      <option value="プラン5">プラン5</option>
                    </select>
                  </form>
                <?php
                }else {
                  echo "配列が存在しません。作成してください。";
                 }
                ?>

                </div>
                </br>
                </br>
                <div id="reservation2">
                  <h1>日時選択画面</h1>
                  <?php
                  if (isset($e)){
                    echo "<br>".$e;
                  }
                    $week = array("E005","月", "火", "水", "木", "金", "土", "日");//曜日を表示するために文字を格納
                  ?>

                    <table border="1" class="tdlink">
                      <th colspan="8">本日から6日後まで予約できます。当日は２時間後以降のみ可能です。</th>
                      <tr></tr>
                      <!--１行目に曜日を表示する。取得した$dbtimeを元に曜日を数値で出して、配列の文字列に置き換えて表示。-->
                      <th>---</th>
                      <th><?php echo $week[date('N',strtotime($dbtime.("+0 day")))]; ?></th>
                      <th><?php echo $week[date('N',strtotime($dbtime.("+1 day")))]; ?></th>
                      <th><?php echo $week[date('N',strtotime($dbtime.("+2 day")))]; ?></th>
                      <th><?php echo $week[date('N',strtotime($dbtime.("+3 day")))]; ?></th>
                      <th><?php echo $week[date('N',strtotime($dbtime.("+4 day")))]; ?></th>
                      <th><?php echo $week[date('N',strtotime($dbtime.("+5 day")))]; ?></th>
                      <th><?php echo $week[date('N',strtotime($dbtime.("+6 day")))]; ?></th>
                      <tr></tr>
                      <!--２行目には$dbtimeを元に当日含め１週間、６日後までを表示する。-->
                      <td></td>
                      <td><?php echo date("m月d日",strtotime($dbtime."+0 day"));?></td>
                      <td><?php echo date("m月d日",strtotime($dbtime."+1 day"));?></td>
                      <td><?php echo date("m月d日",strtotime($dbtime."+2 day"));?></td>
                      <td><?php echo date("m月d日",strtotime($dbtime."+3 day"));?></td>
                      <td><?php echo date("m月d日",strtotime($dbtime."+4 day"));?></td>
                      <td><?php echo date("m月d日",strtotime($dbtime."+5 day"));?></td>
                      <td><?php echo date("m月d日",strtotime($dbtime."+6 day"));?></td>
                      <tr></tr>

                      <?php
                      $hour=0;
                      $min=0;
                      $c=0;
                      $admin=0;//1なら管理者画面で表示。
                      if ($admin==1) {
                        echo "adminモード";
                      }else {
                        echo "user モード";
                      }
                      //今回やってることは・・・
                      //1.同じ日時の予約在庫数に問い合わせて設定を確認し、予約情報に問い合わせて差分がいくつあるかを表示する。
                      //2.同じ場所からaタグクリックで予約追加もする。
                      //3.現在時刻以前と＋２時間後までを予約不可能にする。
                      for ($n=0; $n < 48 ; $n++) {
                        echo '<td align="right">'.sprintf('%02d', $hour).":".sprintf('%02d', $min).'</td>';//テーブル左端の時刻作成
                        for ($i=0; $i < 7 ; $i++) {
                          /*このaタグを押すと同じ$cの値のformが押される。各マスごとの時間が所定の形式でコントローラーに送られ、DBに入る。*/

                          if ($admin==1) {
                            $ac = $a[$c];
                          }else {
                            $ac = "";
                          }
                          //当日の現在時刻＋２時間以前の予約を取れないようにする。
                          if ($hour < date('H', strtotime($dbtime."+2 hour")) && $i==0){
                            //date('H', strtotime($dbtime."+2 hour"))
                            echo '<td  align="center">'.$ac.'<a href="#" onclick="document.form'.$c.'.submit();return false;">---</a></td>';
                          }else{
                            //２２時すぎると全部とれてしまう問題の解決。二時間すぎた時刻が翌日ならば当日は予約不可を表示。
                            if (date('d', strtotime($dbtime."+0 hour")) < date('d', strtotime($dbtime."+2 hour")) && $i==0){
                              echo '<td  align="center">'.$ac.'<a href="#" onclick="document.form'.$c.'.submit();return false;">---</a></td>';
                            }else{
                              //在庫数が０ならXを表示して、予約できないようにする。在庫があればマルを表示してクリックで予約できる。
                              if ($a[$c]>0) {
                                echo '<td  align="center">'.$ac.'
                                <a href="#" id="a'.$c.'" name="'.date('Y-m-d ', strtotime($dbtime."+$i day"))."$hour:$min:00".'" onclick="page2(this);">O</a></td>';
                              }else {
                                echo '<td  align="center">'.$ac.'<a href="#" onclick="document.form'.$c.'.submit();return false;">X</a></td>';
                              }
                            }
                          }
                          $c++;
                        }
                        echo "<tr></tr>";
                        if($min==0){//時刻を３０分ずつずらす。
                            $min=30;
                        }else{//1時間増やす
                            $min=0;
                            $hour++;
                        }
                      }
                      ?>
                    </table>
                </div>

                <div id="reservation3">
                  <h1>お客様情報入力画面</h1>
                  <form accept-charset="UTF-8">
                      <label for="name">名前</label><br>
                      <input type="text" id="userName" name="name"><br><br>
                      <label for="userId">ユーザーID</label><br>
                      <input type="text" id="userId" name="userId"><br><br>
                      <label for="email">メールアドレス</label><br>
                      <input type="email" id="email" name="email"><br><br>
                      <label for="password">パスワード</label><br>
                      <input type="password" id="password" name="password"><br><br>
                      <label for="age">年齢</label><br>
                      <input type="number" id="age" name="age"><br><br>
                      <button onclick="page3();return false;">submit</button>
                  </form>
                </div>

                <div id="reservation4">
                  <h1>予約情報確認画面</h1>
                  <form method="POST" action="reservation" accept-charset="UTF-8">
                  <form accept-charset="UTF-8">
                    <label>プラン名</label><br>
                    <span id="planSpan">-</span><br><br>
                    <input type="hidden" id="planSpanH" name="planSpanH" value="***">

                    <label>プラン詳細</label><br>
                    <span id="detailSpan">*</span><br><br>
                    <input type="hidden" id="detailSpanH" name="detailSpanH" value="***">

                    <label>予約日時</label><br>
                    <span id="timeSpan">-</span><br><br>
                    <input type="hidden" id="timeSpanH" name="timeSpanH" value="***">

                    <label>お名前</label><br>
                    <span id="userNameSpan">-</span><br><br>
                    <input type="hidden" id="userNameSpanH" name="userNameSpanH" value="***">

                    <label>ユーザーID</label><br>
                    <span id="userIdSpan">-</span><br><br>
                    <input type="hidden" id="userIdSpanH" name="userIdSpanH" value="***">

                    <label>メールアドレス</label><br>
                    <span id="emailSpan">-</span><br><br>
                    <input type="hidden" id="emailSpanH" name="emailSpanH" value="***">

                    <label>パスワード</label><br>
                    <span id="passwordSpan">-</span><br><br>
                    <input type="hidden" id="passwordSpanH" name="passwordSpanH" value="***">

                    <label>年齢</label><br>
                    <span id="ageSpan">-</span><br><br>
                    <input type="hidden" id="ageSpanH" name="ageSpanH" value="***">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit">確定</button>
                  </form>
<!--
                <form method="post" action="../reservation" accept-charset="UTF-8">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <button type="submit">登録</button>
                </form>
              -->
                </div>
            </div>
        </div>

        <!--画面内遷移-->
        <script>
        document.getElementById('reservation2').style.display = 'none';
        document.getElementById('reservation3').style.display = 'none';
        document.getElementById('reservation4').style.display = 'none';
        var plan="";
        var time="";
        var userName = "";
        var userId = "";
        var email = "";
        var password = "";
        var age = "";
        function page1(){
          var frm = document.forms["reservationform1"];
          var idx = frm.elements["plan"].selectedIndex;
          plan = frm.elements["plan"].options[idx].value;

          document.getElementById('reservation2').style.display = 'block';
          document.getElementById('reservation').style.display = 'none';
        }

        function page2(element){
          time = element.id;
          time = document.getElementById(time).name;
          document.getElementById('reservation3').style.display = 'block';
          document.getElementById('reservation2').style.display = 'none';
        }

        function page3(){
          userName = document.getElementById("userName");
          userId = document.getElementById("userId");
          email = document.getElementById("email");
          password = document.getElementById("password");
          age = document.getElementById("age");
          userName = userName.value;
          userId = userId.value;
          email = email.value;
          password = password.value;
          age = age.value;
          planSpan = document.getElementById("planSpan");
          timeSpan = document.getElementById("timeSpan");
          userNameSpan = document.getElementById("userNameSpan");
          userIdSpan = document.getElementById("userIdSpan");
          emailSpan = document.getElementById("emailSpan");
          passwordSpan = document.getElementById("passwordSpan");
          ageSpan = document.getElementById("ageSpan");

          planSpan.innerText = plan;
          timeSpan.innerText = time;
          userNameSpan.innerText = userName;
          userIdSpan.innerText = userId;
          emailSpan.innerText = email;
          passwordSpan.innerText = "表示しません";
          ageSpan.innerText = age;

          $("#planSpanH").val(plan);
          $("#timeSpanH").val(time);
          $("#userNameSpanH").val(userName);
          $("#userIdSpanH").val(userId);
          $("#emailSpanH").val(email);
          $("#passwordSpanH").val(password);
          $("#ageSpanH").val(age);
          console.log($("#planSpanH").val());
          console.log($("#timeSpanH").val());
          console.log($("#userNameSpanH").val());
          console.log($("#userIdSpanH").val());
          console.log($("#emailSpanH").val());
          console.log($("#passwordSpanH").val());
          console.log($("#ageSpanH").val());

          document.getElementById('reservation4').style.display = 'block';
          document.getElementById('reservation3').style.display = 'none';
        }

        function page4(){
          console.log("test4 ok");
/*ajaxでpostの書き方
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
          });
          $.ajax({
              type: "POST",
              url: "reservation",
              data: "request=hoge",
              success: function(date){
                  console.log("やったぜ！");
                  console.log(date);
              },
              error: function() {
                  alert("ダメだったよ・・・");
              }
          });
          */
          document.getElementById('reservation').style.display = 'none';
          document.getElementById('reservation2').style.display = 'none';
          document.getElementById('reservation3').style.display = 'none';
          document.getElementById('reservation4').style.display = 'none';

        }
        </script>

    </body>
</html>
