<!DOCTYPE html>
<html>
    <head>
        <title>laravel</title>
        <link rel="stylesheet" media="screen" href="@routes.Assets.versioned("stylesheets/main.css")">
        <link rel="shortcut icon" type="image/png" href="@routes.Assets.versioned("images/favicon.png")">
        <script src="@routes.Assets.versioned("javascripts/hello.js")" type="text/javascript"></script>
        <style type="text/css">
        .form { visibility: hidden; }
        </style>
        <script type="text/javascript"><!--
function ChangeTab(tabname) {
   // 全部消す
   document.getElementById('entry').style.display = 'none';
   document.getElementById('preview').style.display = 'none';
   document.getElementById('sent').style.display = 'none';
   // 指定箇所のみ表示
   document.getElementById(tabname).style.display = 'block';
}
// --></script>
    </head>
    <body>

<h1>support</h1>

<div class="js-tabs">
<p class="tabs">
   <a href="#tab1" class="tab1" onclick="ChangeTab('entry'); return false;">入力</a>
   <a href="#tab2" class="tab2" onclick="ChangeTab('preview'); return false;">確認</a>
   <a href="#tab3" class="tab3" onclick="ChangeTab('sent'); return false;">完了</a>
</p>    
  <div id="tab_content1" class="tab_content">
    <div id="entry" class="page">
    <br><br><br>
<h1>入力</h1>
アカウント名（アドレスになるのでここに送られる）
            <form>
              <input type="text" value="アカウント名">
              <p>お問い合わせ内容<br>
                <select name="blood">
                  <option value="契約について">契約について</option>
                  <option value="アカウントについて">アカウントについて</option>
                  <option value="編集方法について">編集方法について</option>
                  <option value="アプリ申請について">アプリ申請について型</option>
                  <option value="その他">その他</option>
                </select></p>
                  詳細<br>
              <input type="text" name="" value="詳細">

            </form>        
        <div class="actions">
            <input type="submit" value="確認する" class="btn primary"> or 
            <a href="@routes.Support.support()" class="btn">Cancel</a> 
        </div>
    </div>
    <br><br><br><br>
    <div id="preview" class="page">


      <h1>確認</h1>
      <br>
       @form(routes.Support.onfirmation()) {
        
        <fieldset>
        <br>
        <p>[アカウント名]</p>
        <br>
        @Cache.get("user_name")
        <br>
        <p>[お問い合わせ内容選択]</p>
        <br>
        @Cache.get("form_select")
        <br>
        <p>[詳細]</p>
        <br>
        @Cache.get("detail")
        
        </div>

        </fieldset>
        
        <div class="actions">
            <input type="submit" value="送信する" class="btn primary"> or 
            <a href="@routes.Support.support()" class="btn">Cancel</a> 
        </div>

      }
    </div>
    <br><br><br><br>
    <div id="sent" class="page">
      <h1>完了</h1>
      <br>
      送信ありがとうございました。
      <a href="@routes.Support.support()" class="btn">戻る</a> 
    </div>
  </div>
</div>
<script type="text/javascript"><!--
   // デフォルトのタブを選択
   ChangeTab('entry');
// --></script>
    </body>
</html>
