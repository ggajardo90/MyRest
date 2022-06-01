<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Login</title>
</head>

<body>


    <form action="{{ route('login') }}" method="POST">
        @csrf
        username/email
        <input type="text" name="email" id="" placeholder="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        password
        <input type="password" name="password" id="" placeholder="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="submit" value="Login">


    </form>



</body>

</html>
