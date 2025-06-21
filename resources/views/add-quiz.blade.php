<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar name={{$name}}></x-navbar>
    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8">
        <div class=" bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

            @if(!Session('quizDetails'))
            <h2 class="text-2xl text-center text-gray-800 mb-6">Add Quiz</h2>

            <form action="/add-quiz" method="get" class="space-y-4">
                <div>
                    <input type="text" name="quiz" required placeholder="Enter Your Quiz  Name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                </div>
                <div>
                    <select type="text" name="category_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="w-full px-4 py-2 border bg-blue-400 rounded-xl text-white">Add</button>
            </form>

            @else
            <span class="text-green-500 font-bold ">Quiz Name: {{Session('quizDetails')->name}}</span>
            <p class="text-green-500 font-bold ">Total Quiz Count :{{$totalMCQs}}
                @if($totalMCQs>0)
                <a class="text-yellow-500 text-sm " href="/show-quiz/{{Session('quizDetails')->id}}">Show MCQs</a>
                @endif
            </p>

            <h2 class="text-2xl text-center text-gray-800 mb-6">Add MCQs</h2>
            <form action="/add-mcq" method="post" class="space-y-4">
                @csrf
                <div>
                    <textarea type="text" name="question" placeholder="Enter Your Question"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">Enter Your Question
                    </textarea>
                    @error('question')<div class="text-red-500">{{$message}}</div>@enderror
                </div>
                <div>
                    <input type="text" name="a" placeholder="Enter Your First option"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('a')<div class="text-red-500">{{$message}}</div>@enderror
                </div>
                <div>
                    <input type="text" name="b" placeholder="Enter Your Second option"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('b')<div class="text-red-500">{{$message}}</div>@enderror
                </div>
                <div>
                    <input type="text" name="c" placeholder="Enter Your Third option"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('c')<div class="text-red-500">{{$message}}</div>@enderror
                </div>
                <div>
                    <input type="text" name="d" placeholder="Enter Your Fourth option"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('d')<div class="text-red-500">{{$message}}</div>@enderror
                </div>
                <div>
                    <select name="correct_ans"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        <option value="">Select Right Answer</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                    @error('correct_ans')<div class="text-red-500">{{$message}}</div>@enderror
                </div>
                <button type="submit" name="submit" value="add-more" class="w-full px-4 py-2 border bg-blue-400 rounded-xl text-white">Add More</button>
                <button type="submit" name="submit" value="done" class="w-full px-4 py-2 border bg-green-400 rounded-xl text-white">Add & Submit</button>
                <a href="/end-quiz" class="w-full block text-center  px-4 py-2 border bg-red-400 rounded-xl text-white">Finish Quiz </a>
            </form>
            @endif

        </div>
    </div>
</body>