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

    <img src="{{ asset('img/MyRest (3).png') }}" alt="logo aplicacion" height="150" width="150" >
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">

                <form action="{{ route('login') }}" method="POST" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                    @csrf
                    <h1 class="text-5xl text-gray-800 font-medium flex flex-1 justify-center item-center ">Iniciar Sesion</h1>
                    <br>

                    <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Usuario</label>
                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" type="text" name="email" id="" placeholder="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label class="block text-sm text-gray-600 pt-10" for="cus_email">Contraseña</label>
                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded"  type="password" name="password" id="" placeholder="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mt-4  text-center pt-10 ">

                    <input class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded " type="submit" value="Login">
                    <br>
                        <a class="inline-block right-0 align-baseline font-bold text-sm text-100 hover:text-blue-800"
                            href="login.html">
                            Olvidaste tu contraseña?
                </div>

                </form>



</body>

</html>
