<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{str_replace('-',' ',$quizName)}}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>
    @if(session('message-success'))
    <div class="">
        <p class="text-green-500 font-semibold text-shadow-xs">{{session('message-success')}}</p>
    </div>
    @endif

    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8">
        <h1 class="text-4xl text-center text-green-700 font-semibold text-shadow-sm mb-6">{{str_replace('-',' ',$quizName)}}
        </h1>
        <h2 class="text-lg text-center text-green-700 font-semibold text-shadow-2xs mb-6">This Quiz Contain {{$quizCount}} Questions and no limit to attempt this Quiz</h2>
        <h1 class="text-2xl text-center text-green-700 font-semibold text-shadow-xs mb-6">Good Luck</h1>
        @if(session('user'))
        <a type="submit" href="/mcq/{{session('firstMCQ')->id.'/'.$quizName}}" class=" px-4 py-2 my-3 border bg-blue-400 shadow-sm rounded-md text-white">Start Quiz</a>
        @else
        <a type="submit" href="/user-signup-quiz" class=" px-4 py-2 my-3 border bg-blue-400 shadow-sm rounded-md text-white">SignUp for Start Quiz</a>
        <a type="submit" href="/user-login-quiz" class=" px-4 py-2 my-3 border bg-blue-400 shadow-sm rounded-md text-white">Login for Start Quiz</a>
        @endif
    </div>
</body>

</html>