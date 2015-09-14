<!DOCTYPE html>
<html>
    <head>
      <?php
      header("Content-Type: text/html; charset=UTF-8");
      echo "UTF-8です";
      ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>クリ８</title>
    </head>
    <body>
        <form method="post" action="../posts" accept-charset="UTF-8">
            <label for="title">title</label><br>
            <input type="number" name="title"><br>
            <label for="body">body</label><br>
            <input type="text" name="body"></textarea><br>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit">submit</button>

   @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
        </form>
    </body>
</html>
