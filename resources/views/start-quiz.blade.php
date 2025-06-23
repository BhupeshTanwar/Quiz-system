<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8">
        <h1 class="text-4xl text-center text-green-700 font-bold mb-6">{{$quizName}}
        </h1>
        <h2 class="text-lg text-center text-green-700 font-bold mb-6">This Quiz Contain {{$quizCount}} Questions and no limit to attempt this Quiz</h2>
        <h1 class="text-2xl text-center text-green-700 font-bold mb-6">Good Luck</h1>
        <button type="submit" class=" px-4 py-2 my-3 border bg-blue-400 rounded-md text-white">Login/SignUp For Start Quiz</button>
    </div>
</body>

</html>