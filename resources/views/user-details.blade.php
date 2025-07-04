<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Details Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class="flex flex-col min-h-screen items-center bg-gray-100">
        <h1 class="text-4xl font-semibold text-shadow-sm text-green-700 p-5">Attempted Quiz</h1>
        <div class="w-200">
            <ul class="rounded-xl inset-shadow-sm">
                <li class="p-2 font-semibold text-shadow-xs inset-shadow-md">
                    <ul class="flex justify-between">
                        <li class="w-50 ">S. No</li>
                        <li class="w-100 ">Name</li>
                        <li class="w-50 ">Status</li>
                    </ul>
                </li>
                @foreach($quizRecord as $key=>$record)
                <li class="even:bg-gray-200 p-2 text-shadow-xs inset-shadow-md rounded-md">
                    <ul class="flex justify-between">
                        <li class="w-50 ">{{$key+1}}</li>
                        <li class="w-100 ">{{$record->name}}</li>
                        <li class="w-50 ">
                            @if($record->status==2)
                            <span class="text-green-500 font-semibold text-shadow-xs">Completed</span>
                            @else
                            <span class="text-orange-500 font-semibold text-shadow-xs">Not Completed</span>
                            @endif
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