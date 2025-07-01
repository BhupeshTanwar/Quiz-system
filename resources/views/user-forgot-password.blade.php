<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class="bg-white-100 my-3 flex items-center justify-center min-h-screen">

        <div class=" bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
            <h2 class="text-2xl text-center text-gray-800 font-semibold text-shadow-sm mb-6 ">Forgot Password :</h2>

            @error('user')
            <div class="text-red-500 font-semibold text-shadow-xs">{{$message}}</div>
            @enderror

            <form action="/user-forgot-password" method="post" class="space-y-4 font-semibold text-shadow-xs">
                @csrf
                <div>
                    <input type="text" name="email" placeholder="Enter User Email :"
                        class="w-full px-4 py-2 shadow-md border-none rounded-xl focus:outline-none">
                    @error('email')
                    <div class="text-red-500 font-semibold text-shadow-xs">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 border bg-blue-400 rounded-xl shadow-sm text-white">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>