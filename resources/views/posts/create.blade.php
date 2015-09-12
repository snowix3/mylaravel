<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="../posts">
            <label for="title">title</label><br>
            <input type="number" name="title"><br>
            <label for="body">body</label><br>
            <input type="text" name="body"></textarea><br>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit">submit</button>
        </form>
    </body>
</html>
