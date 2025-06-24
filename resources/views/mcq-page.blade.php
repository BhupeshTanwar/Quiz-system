<!DOCTYPE html>
<html lang="en">

<head>
    <title>MCQ Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class="bg-white-100 flex flex-col items-center min-h-screen pt-8">
        <h1 class="text-3xl text-center text-green-800 font-bold mb-6">Java !0 Questions for interview
        </h1>
        <h1 class="text-2xl text-center text-green-700 font-bold mb-6">Questions No. 3
        </h1>

        <div class="my-4 p-5 bg-white shadow-xl rounded-xl w-140">
            <h3 class="text-green-700 font-bold text-2xl mb-1 ">Q.1 what is java ?</h3>
            <form action="" class="space-y-4" method="get">
                <label for="option_1" class="flex border p-2 mt-2 rounded-2xl shadow-xl cursor-pointer hover:bg-blue-50 ">
                    <input type="radio" class="form-radio text-blue-500" name="" id="option_1">
                    <span class="text-green-800 pl-2">Programming Language</span>
                </label>
                <label for="option_2" class="flex border p-2 mt-2 rounded-2xl shadow-xl cursor-pointer hover:bg-blue-50 ">
                    <input type="radio" class="form-radio text-blue-500" name="" id="option_2">
                    <span class="text-green-800 pl-2">Programming Language</span>
                </label>
                <label for="option_3" class="flex border p-2 mt-2 rounded-2xl shadow-xl cursor-pointer hover:bg-blue-50 ">
                    <input type="radio" class="form-radio text-blue-500" name="" id="option_3">
                    <span class="text-green-800 pl-2">Programming Language</span>
                </label>
                <label for="option_4" class="flex border p-2 mt-2 rounded-2xl shadow-xl cursor-pointer hover:bg-blue-50 ">
                    <input type="radio" class="form-radio text-blue-500" name="" id="option_4">
                    <span class="text-green-800 pl-2">Programming Language</span>
                </label>
                <button type="submit" class="w-full  px-4 py-2 border bg-blue-400 rounded-xl text-white">Submit Your Answer and Next</button>
            </form>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>

</html>