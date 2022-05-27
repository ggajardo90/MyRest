<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="/login" method="POST">
        @csrf
        username/email
        <input type="text" name="username" id="">

        password
        <input type="password" name="password" id="">

        <input type="submit" value="Login">

        <a href="/index">index</a>
    </form>

</body>
</html>
