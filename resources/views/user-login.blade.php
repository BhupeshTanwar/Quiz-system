<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class="bg-white-100 flex items-center justify-center min-h-screen">

        <div class=" bg-white p-8 rounded-2xl shadow-xl  w-full max-w-sm">
            @if(session('message-error'))
            <div class="">
                <p class="text-red-500 font-bold">{{session('message-error')}}</p>
            </div>
            @endif

            @if(session('message-success'))
            <div class="">
                <p class="text-green-500 font-bold">{{session('message-success')}}</p>
            </div>
            @endif

            <h2 class="text-2xl text-center font-semibold text-shadow-md text-gray-800 mb-6">User Login</h2>

            @error('user')
            <div class="text-red-500">{{$message}}</div>
            @enderror

            <form action="/user-login" method="post" class="space-y-4 font-semibold text-shadow-sm">
                @csrf
                <div>
                    <label for="" class="text-gray-700 mb-1">User Email :</label>
                    <input type="text" name="email" placeholder="Enter User Email :"
                        class="w-full px-4 py-2 shadow-md border-none rounded-xl focus:outline-none">
                    @error('email')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label for="" class="text-gray-700 mb-1">Password :</label>
                    <input type="password" name="password" placeholder="Enter User Password"
                        class="w-full px-4 py-2 shadow-md border-none rounded-xl focus:outline-none">
                    @error('password')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 border bg-blue-400 shadow-lg rounded-xl text-white">Login</button>
                <a class="text-green-500 " href="/user-forgot-password">Forget Password ?</a>
            </form>
        </div>
    </div>
</body>

</html>