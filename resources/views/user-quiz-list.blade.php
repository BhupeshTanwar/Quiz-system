<!DOCTYPE html>
<html lang="en">

<head>
    <title>Category : {{str_replace('-',' ',$category)}}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8">
        <h2 class="text-2xl text-center text-green-700 font-semibold text-shadow-xs mb-6">Category Name : {{str_replace('-',' ',$category)}}
        </h2>
        <div class="w-200">
            <ul class="rounded-xl inset-shadow-sm">
                <li class="p-2 font-semibold text-shadow-xs inset-shadow-md">
                    <ul class="flex justify-between">
                        <li class="w-30 ">Quiz Id</li>
                        <li class="w-110 ">Name</li>
                        <li class="w-30 ">Mcq Count</li>
                        <li class="w-30 ">Action</li>
                    </ul>
                </li>
                @foreach($quizData as $item)
                <li class="even:bg-gray-200 p-2 text-shadow-xs inset-shadow-md rounded-md">
                    <ul class="flex justify-between">
                        <li class="w-30 ">{{$item->id}}</li>
                        <li class="w-110 ">{{$item->name}}</li>
                        <li class="w-30 ">{{$item->mcq_count}}</li>
                        <li class="w-30">
                            <a href="/start-quiz/{{$item->id}}/{{str_replace(' ','-',$item->name)}}" class="text-green-500 font-semibold text-shadow-xs">Attempt Quiz</a>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>