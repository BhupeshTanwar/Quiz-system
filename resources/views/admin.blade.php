<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar name={{$name}}></x-navbar>
    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8 mb-10">
        <div class="w-200 shadow-xl">
            <h1 class="text-3xl font-bold text-center text-blue-500 mb-6 ">Users List</h1>
            <ul class="border border-gray-200">
                <li class="p-2 font-bold text-gray-950">
                    <ul class="flex justify-between ">
                        <li class="w-30 ">S. No</li>
                        <li class="w-70 ">Name</li>
                        <li class="w-80 ">Email</li>
                    </ul>
                </li>
                @foreach($users as $key=>$user)
                <li class="even:bg-gray-200 p-2">
                    <ul class="flex justify-between text-gray-900">
                        <li class="w-30 ">{{$key+1}}</li>
                        <li class="w-70 ">{{$user->name}}</li>
                        <li class="w-80 ">{{$user->email}}</li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-5 text-2xl">
            {{$users->links()}}
        </div>
    </div>
</body>

</html>