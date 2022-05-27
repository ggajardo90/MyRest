<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <title>Register</title>

</head>
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form action="/register" method="POST" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">

                @csrf
                <p class="text-gray-800 font-medium">Register</p>
                <br>

                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="name">
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-gray-00" for="cus_name">Username</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="username">
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" type="email" name="email">
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Password</label>
                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" type="password" name="password">
                </div>

                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Password Confirmation</label>
                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" type="password"
                        name="password_confirmation">
                </div>
                <div class="mt-4  text-center pt-10 ">
                    <input class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded  " type="submit"
                        value="Registrarse">
                    <br>
                    <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800"
                        href="login.html">
                        Already have an account ?
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>
