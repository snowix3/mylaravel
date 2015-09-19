<!DOCTYPE html>
<html>
    <head>
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
        </style>


        <script type="text/javascript">

        var xmlHttp;

        function loadText(){
          if (window.XMLHttpRequest){
            xmlHttp = new XMLHttpRequest();
          }else{
            if (window.ActiveXObject){
              xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }else{
              xmlHttp = null;
            }
          }
          xmlHttp.onreadystatechange = checkStatus;
          xmlHttp.open("GET", "https://wordpress.org/plugins/about/readme.txt", true);

          xmlHttp.send(null);
        }

        function checkStatus(){
          if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
            var node = document.getElementById("disp");
            node.innerHTML = xmlHttp.responseText;
          }
        }


        </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">AJAX OK</div>

                <button value="test" onclick="loadText()">TEST</button>

                <div id="disp"></div>
            </div>
        </div>
    </body>
</html>
