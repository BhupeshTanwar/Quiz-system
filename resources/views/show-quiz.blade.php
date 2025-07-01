<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar name={{$name}}></x-navbar>

    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8">
        <h2 class="text-2xl text-center text-gray-800 font-semibold text-shadow-sm mb-6">Quiz Name : {{$quizName}}
            <a class="text-yellow-500 text-sm font-semibold text-shadow-xs" href="/add-quiz">Back</a>
        </h2>
        <div class="w-200">
            <ul class="border-none rounded-xl inset-shadow-xl">
                <li class="p-2 font-semibold text-shadow-sm rounded-md">
                    <ul class="flex justify-between">
                        <li class="w-30 ">MCQ Id</li>
                        <li class="w-170 ">Questions</li>
                    </ul>
                </li>
                @foreach($mcqs as $mcq)
                <li class="even:bg-gray-200 p-2 rounded-md inset-shadow-xl text-shadow-sm">
                    <ul class="flex justify-between">
                        <li class="w-30 ">{{$mcq->id}}</li>
                        <li class="w-170 ">{{$mcq->question}}</li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>