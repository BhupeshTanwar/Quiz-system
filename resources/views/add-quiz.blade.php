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
                    <input type="text" name="quiz" placeholder="Enter Your Quiz  Name"
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
            <h2 class="text-2xl text-center text-gray-800 mb-6">Add MCQs</h2>
            <form action="" method="get" class="space-y-4">
                <div>
                    <textarea type="text"placeholder="Enter Your Question"  name="quiz" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">Enter Your Question
                    </textarea>
                </div>
                <div>
                    <input type="text" name="quiz" placeholder="Enter Your First option"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                </div>
                <div>
                    <input type="text" name="quiz" placeholder="Enter Your Second option"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                </div>
                <div>
                    <input type="text" name="quiz" placeholder="Enter Your Third option"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                </div>
                <div>
                    <input type="text" name="quiz" placeholder="Enter Your Fourth option"
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                </div>
                <div>
                    <select name="Right answer" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        <option>Select Right Answer</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </select>
                </div>
                <button type="submit" class="w-full px-4 py-2 border bg-blue-400 rounded-xl text-white">Add More</button>
                <button type="submit" class="w-full px-4 py-2 border bg-green-400 rounded-xl text-white">Add & Submit</button>
            </form>
            @endif

        </div>
    </div>
</body>