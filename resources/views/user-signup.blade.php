<!DOCTYPE html>
<html lang="en">

<head>
    <title>User SignUp</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class="bg-white-100 my-3 flex items-center justify-center min-h-screen">

        <div class=" bg-white p-8 w-full max-w-sm shadow-xl rounded-xl">
            <h2 class="text-2xl  text-center font-semibold text-shadow-md text-gray-800 mb-6">User SignUp</h2>

            @error('user')
            <div class="text-red-500">{{$message}}</div>
            @enderror

            <form action="/user-signup" method="post" class="space-y-4 font-semibold text-shadow-sm">
                @csrf
                <div class="">
                    <label for="" class="text-gray-700 mb-1 ">User Name :</label>
                    <input type="text" name="name" placeholder="Enter User Name"
                        class="w-full px-4 py-2 shadow-md border-none rounded-xl focus:outline-none">
                    @error('name')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
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
                <div>
                    <label for="" class="text-gray-700 mb-1">Conform Password :</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm User Password"
                        class="w-full px-4 py-2 shadow-md border-none rounded-xl focus:outline-none">
                </div>
                <button type="submit" class="w-full px-4 py-2 border bg-blue-400 shadow-lg rounded-xl text-white">SignUp</button>
            </form>
        </div>
    </div> 
</body>

</html>