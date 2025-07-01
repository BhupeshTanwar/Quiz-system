<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz System Home Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class="flex flex-col min-h-screen items-center bg-gray-50">
        @if(session('message-success'))
        <div class="">
            <p class="text-green-500 font-bold">{{session('message-success')}}</p>
        </div>
        @endif

        <h1 class="text-4xl font-bold text-green-700 p-5 text-shadow-lg ">Check Your Skills</h1>
        <div class="w-full max-w-md">
            <div class="relative">
                <form action="/search-quiz" method="get">
                    <input class="w-full px-4 py-3 text-gray-700 border-none 
                    rounded-2xl shadow-lg " type="text" name="search" id="" placeholder="Search Quiz...">
                    <button class="absolute right-2 top-3  ">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#808080">
                            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="w-200 rounded-2xl ">
            <h1 class="text-2xl text-green-700 text-center my-5 text-shadow-lg">Top Categories</h1>
            <ul class=" rounded-xl inset-shadow-sm">
                <li class="p-2 font-semibold text-shadow-lg">
                    <ul class="flex justify-between ">
                        <li class="w-30 ">S. No</li>
                        <li class="w-90 ">Name</li>
                        <li class="w-50 ">Quiz Count</li>
                        <li class="w-30 ">Action</li>
                    </ul>
                </li>
                @foreach($categories as $key=>$category)
                <li class="even:bg-gray-200 p-2 inset-shadow-sm">
                    <ul class="flex justify-between text-shadow-md">
                        <li class="w-30 ">{{$key+1}}</li>
                        <li class="w-90 ">{{$category->name}}</li>
                        <li class="w-50 ">{{$category->quizzes_count}}</li>
                        <li class="w-30 flex">
                            <a href="/user-quiz-list/{{$category->id}}/{{str_replace(' ','-',$category->name)}}" class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="w-200 ">
            <h1 class="text-2xl text-green-700 text-center my-10 text-shadow-lg">Top Quiz</h1>
            <ul class=" border-gray-200 mb-15 ">
                <li class="p-2 font-semibold text-shadow-lg inset-shadow-sm rounded-xl">
                    <ul class="flex justify-between">
                        <li class="w-150 ">Name</li>
                        <li class="w-50 ">Action</li>
                    </ul>
                </li>
                @foreach($quizData as $item)
                <li class="even:bg-gray-200 p-2 inset-shadow-sm">
                    <ul class="flex justify-between text-shadow-md">
                        <li class="w-150 ">{{$item->name}}</li>
                        <li class="w-50">
                            <a href="/start-quiz/{{$item->id}}/{{str_replace(' ','-',$item->name)}}" class="text-green-500 font-semibold">Attempt Quiz</a>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
    <x-footer-user></x-footer-user>
</body>

</html>