<!DOCTYPE html>
<html>
<head>
  <title>laravel</title>
  <script type="text/javascript">
    <!--
    function ChangeTab(tabname) {
   // 一度全て隠す
   document.getElementById('entry').style.display = 'none';
   document.getElementById('preview').style.display = 'none';
   document.getElementById('sent').style.display = 'none';
   // 引数で指定された箇所のみ表示
   document.getElementById(tabname).style.display = 'block';
 }
 // -->
</script>
</head>
<body>

  <h1>support</h1>
  {{{ time() }}}

    <!--メニュータブ-->
    <p class="tabs">
     <a href="#tab1" class="tab1" onclick="ChangeTab('entry'); return false;">入力</a>
     <a href="#tab2" class="tab2" onclick="ChangeTab('preview'); return false;">確認</a>
     <a href="#tab3" class="tab3" onclick="ChangeTab('sent'); return false;">完了</a>
   </p>    
   

     <!--ここからタブ１の入力フォーム画面-->
     <div id="entry" class="page">
      <br><br><br>
      <h1>入力</h1>
      アカウント名（アドレスになるのでここに送られる）
        <form action="../cache" method="POST" accept-charset="UTF-8">
        <input type="text" name="user_name">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <p>お問い合わせ内容<br>
          <select name="form_select">
            <option value="契約について">契約について</option>
            <option value="アカウントについて">アカウントについて</option>
            <option value="編集方法について">編集方法について</option>
            <option value="アプリ申請について">アプリ申請について型</option>
            <option value="その他">その他</option>
          </select></p>
          詳細
          <br>
          <input type="text" name="detail">
          <br>      
          <input type="submit" value="確認する">
          </form>
          or
          <br>
          <a href="" class="btn">Cancel</a> 
      </div>
      <br><br><br><br>

      <!--ここからタブ２の入力確認画面-->
      <div id="preview" class="page">
        <h1>確認</h1>
        <br><br>
          <p>[アカウント名]</p>
          <br>
          user_name
          <br>
          <p>[お問い合わせ内容選択]</p>
          <br>
          Cacheで　form_select　を表示
          <br>
          <p>[詳細]</p>
          <br>
          Cache　detail　を表示
          <br>
          <form action="../cache/create" method="GET" accept-charset="UTF-8">

          <input type="submit" value="決定"　> or 
          <a href="" class="btn">Cancel</a> 
        </div>
  <br><br><br><br>

  <!--ここからタブ３の入力完了画面-->
  <div id="sent" class="page">
    <h1>完了</h1>
    <br>
    送信ありがとうございました。
    <a href="" class="btn">戻る</a> 
  </div>
<script type="text/javascript"><!--
   // デフォルトのタブを選択
   ChangeTab('entry');
   // --></script>
 </body>
 </html>
