<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white-100 flex items-center justify-center min-h-screen">
    <div class=" bg-white p-8 rounded-2xl shadow-xl w-full max-w-sm">
        <h2 class="text-2xl text-center font-semibold text-shadow-sm text-gray-800 mb-6">Admin Login</h2>

        @error('user')
        <div class="text-red-500">{{$message}}</div>
        @enderror

        <form action="/admin-login" method="post" class="space-y-4 font-semibold text-shadow-sm">
            @csrf
            <div>
                <label for="" class="text-gray-700 mb-1 ">Admin Name :</label>
                <input type="text" name="name" placeholder="Enter Your Name"
                    class="w-full px-4 py-2 shadow-md border-none rounded-xl focus:outline-none">
                @error('name')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="" class="text-gray-700 mb-1">Password :</label>
                <input type="password" name="password" placeholder="Enter Admin Password"
                    class="w-full px-4 py-2 shadow-md border-none rounded-xl focus:outline-none">
                @error('password')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="w-full px-4 py-2 border bg-blue-400 shadow-lg rounded-xl text-white">Login</button>
        </form>

    </div>
</body>

</html>