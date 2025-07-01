<!DOCTYPE html>
<html lang="en">

<head>
    <title>MCQ Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8">
        <h1 class="text-3xl text-center text-green-800 font-semibod text-shadow-sm mb-6">{{$quizName}}
        </h1>
        <h2 class="text-2xl text-center text-green-700 font-semibod text-shadow-xs mb-6">Total Questions No.{{session('currentQuiz')['totalMcq']}}
        </h2>

        <h2 class="text-xl text-center text-green-700 font-semibod text-shadow-2xs mb-6">{{session('currentQuiz')['currentMcq']}} of {{session('currentQuiz')['totalMcq']}}
        </h2>

        <div class="my-4 p-5 bg-white shadow-xl rounded-xl w-140">
            <h3 class="text-green-700 font-semibod text-shadow-xs text-2xl mb-1 ">{{$mcqData->question}}</h3>
            
            <form action="/submit-next/{{$mcqData->id}}" class="space-y-4 font-semibold text-shadow-sm" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$mcqData->id}}">
                <label for="option_1" class="flex border p-2 mt-2 rounded-2xl shadow-xl cursor-pointer hover:bg-blue-50 ">
                    <input type="radio" class="form-radio text-blue-500" value="a" name="option" id="option_1">
                    <span class="text-green-800 pl-2">{{$mcqData->a}}</span>
                </label>
                <label for="option_2" class="flex border p-2 mt-2 rounded-2xl shadow-xl cursor-pointer hover:bg-blue-50 ">
                    <input type="radio" class="form-radio text-blue-500" value="b" name="option" id="option_2">
                    <span class="text-green-800 pl-2">{{$mcqData->b}}</span>
                </label>
                <label for="option_3" class="flex border p-2 mt-2 rounded-2xl shadow-xl cursor-pointer hover:bg-blue-50 ">
                    <input type="radio" class="form-radio text-blue-500" value="c" name="option" id="option_3">
                    <span class="text-green-800 pl-2">{{$mcqData->c}}</span>
                </label>
                <label for="option_4" class="flex border p-2 mt-2 rounded-2xl shadow-xl cursor-pointer hover:bg-blue-50 ">
                    <input type="radio" class="form-radio text-blue-500" value="d" name="option" id="option_4">
                    <span class="text-green-800 pl-2">{{$mcqData->d}}</span>
                </label>
                <button type="submit" class="w-full px-4 py-2 border bg-blue-400 shadow-sm rounded-xl text-white">Submit Your Answer and Next</button>
            </form>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>

</html>