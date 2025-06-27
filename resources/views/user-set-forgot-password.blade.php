<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Set Password</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class="bg-white-100 my-3 flex items-center justify-center min-h-screen">

        <div class=" bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
            <h2 class="text-2xl text-center text-gray-800 mb-6">User Set Password</h2>

            @error('user')
            <div class="text-red-500">{{$message}}</div>
            @enderror

            <form action="/user-set-forgot-password" method="post" class="space-y-4">
                @csrf
                
                <div>
                    <input type="hidden" name="email" value="{{$email}}" placeholder="Enter User Email :"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('email')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label for="" class="text-gray-700 mb-1">Password :</label>
                    <input type="password" name="password" placeholder="Enter User Password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('password')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="" class="text-gray-700 mb-1">Conform Password :</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm User Password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                </div>
                <button type="submit" class="w-full px-4 py-2 border bg-blue-400 rounded-xl text-white">Update Password</button>
            </form>
        </div>
    </div>
</body>

</html>