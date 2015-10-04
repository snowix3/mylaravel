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

  <h1>プラン選択画面</h1>
  <font color = red>注意<br>
  現段階ではボタンを押しても自動で次のタブに遷移しないので、<br>
  入力メニューでフォーム入力したらプラン選択の確認タブを押す、以降のタブも同様の操作でおなしゃす。
  </font>

    <!--メニュータブ-->
    <p class="tabs">
     <a href="#tab1" class="tab1" onclick="ChangeTab('entry'); return false;">選択</a>
     <a href="#tab2" class="tab2" onclick="ChangeTab('preview'); return false;">確認</a>
     <a href="#tab3" class="tab3" onclick="ChangeTab('sent'); return false;">完了</a>
   </p>    
   

     <!--ここからタブ１の入力フォーム画面-->
     <div id="entry" class="page">
      <br><br><br>
      <h1>入力</h1>
      アカウント名（アドレスになるのでここに送られる）<br>
      記入例:メールアドレスがsample@gmail.comの場合はsampleと入力する。<br>
      <font color = red>今の設定だとgmailのみ使える。</font>
        <form action="../cache" method="POST" accept-charset="UTF-8">
        <input type="text" name="user_name">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <p>プラン選択<br>

        プラン一覧<br>
        
       




          <select name="plan_select">
            <option value="プラン１">プラン１</option>
            <option value="プラン２">プラン２</option>
            <option value="プラン３">プラン３</option>
            <option value="プラン４">プラン４</option>
            <option value="プラン５">プラン５</option>
          </select></p>
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
          <p>[
          <?php 
          echo Cache::get('user_name');
           ?>
           ]</p>
          <br>
          <p>[お問い合わせ内容選択]</p>
          <br>
          <p>[
          <?php 
          echo Cache::get('plan_select');
           ?>
           ]</p>
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
