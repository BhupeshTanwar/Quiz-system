<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar name={{$name}}></x-navbar>

    @if(session('category'))
    <div class="bg-green-800 text-white font-sans text-center pl-5 ">{{session('category')}}</div>
    @endif

    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8">
        <div class=" bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
            <h2 class="text-2xl text-center text-gray-800 mb-6 font-semibold text-shadow-md">Add Category</h2>

            <form action="/add-category" method="post" class="space-y-4 font-semibold text-shadow-sm">
                @csrf
                <div>
                    <input type="text" name="category" placeholder="Enter Your Category"
                        class="w-full px-4 py-2 border-none shadow-md rounded-xl focus:outline-none">
                    @error('category')<div class="text-red-500">{{$message}}</div>@enderror
                </div>

                <button type="submit" class="w-full px-4 py-2 border bg-blue-400 shadow-lg rounded-xl text-white">Add</button>
            </form>

        </div>

        <div class="w-200 mb-5 ">
            <h1 class="text-2xl text-center my-3 text-blue-500 font-semibold text-shadow-md">Category List</h1>
            <ul class="rounded-xl inset-shadow-sm">
                <li class="p-2 font-bold text-shadow-sm text-gray-900 inset-shadow-md">
                    <ul class="flex justify-between">
                        <li class="w-30 ">S. No</li>
                        <li class="w-70 ">Name</li>
                        <li class="w-70 ">Creator</li>
                        <li class="w-30 ">Delete</li>
                    </ul>
                </li>
                @foreach($categories as $category)
                <li class="even:bg-gray-200 p-2 inset-shadow-md text-shadow-sm rounded-md">
                    <ul class="flex justify-between">
                        <li class="w-30 ">{{$category->id}}</li>
                        <li class="w-70 ">{{$category->name}}</li>
                        <li class="w-70 ">{{$category->creator}}</li>
                        <li class="w-30 flex">
                            <a href="category/delete/{{$category->id}}" class=""><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#000000">
                                    <path d="M305.85-108.65q-44.57 0-74.87-30.3-30.31-30.31-30.31-74.88v-483.06h-53.5v-105.18h229.57v-60.3h207.8v60.3h229.81v105.18h-53.5v482.63q0 44.36-30.77 74.99-30.78 30.62-74.41 30.62H305.85Zm349.82-588.24H305.85v483.06h349.82v-483.06ZM361.8-283.96h99.68v-342.8H361.8v342.8Zm138.48 0h99.68v-342.8h-99.68v342.8ZM305.85-696.89v483.06-483.06Z" />
                                </svg>
                            </a>
                            <a href="/quiz-list/{{$category->id}}/{{$category->name}}" class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>