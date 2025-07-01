<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar name={{$name}}></x-navbar>
    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8 mb-10 ">
        <div class=" rounded-2xl w-200">
            <h1 class="text-4xl font-semibold text-center text-blue-500 mb-6 text-shadow-lg">Users List</h1>
            <ul class="rounded-xl inset-shadow-sm">
                <li class="p-2 font-semibold text-shadow-lg">
                    <ul class="flex justify-between text-shadow-md text-xl">
                        <li class="w-30 ">S. No</li>
                        <li class="w-70 ">Name</li>
                        <li class="w-80 ">Email</li>
                    </ul>
                </li>
                @foreach($users as $key=>$user)
                <li class="even:bg-gray-200 p-2 inset-shadow-sm">
                    <ul class="flex justify-between text-yellow-800 text-shadow-md">
                        <li class="w-30 ">{{$key+1}}</li>
                        <li class="w-70 ">{{$user->name}}</li>
                        <li class="w-80 ">{{$user->email}}</li>
                    </ul>
                </li>
                @endforeach
            </ul>
            <div class=" mb-10 mt-5">
            {{$users->links()}}
        </div>
        </div>
        
    </div>
</body>

</html>