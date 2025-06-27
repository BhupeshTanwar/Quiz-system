<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz Result</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class="flex flex-col min-h-screen items-center bg-gray-100">
        <h1 class="text-4xl font-bold text-green-700 p-5">Quiz Result</h1>

        <div class="w-200">
            @if($correctAnswers*100/count($resultData)>70)
            <a class="text-green-500 font-bold block " href="/certificate">View And Download Certificate</a>
            @endif
            <h1 class="text-2xl text-green-700 text-center my-5">{{$correctAnswers}} Out of {{count($resultData)}} Correct</h1>
            <ul class="border border-gray-200">
                <li class="p-2 font-bold">
                    <ul class="flex justify-between">
                        <li class="w-30 ">S. No</li>
                        <li class="w-140 ">Question</li>
                        <li class="w-30 ">Result</li>
                    </ul>
                </li>
                @foreach($resultData as $key=>$item)
                <li class="even:bg-gray-200 p-2 ">
                    <ul class="flex justify-between">
                        <li class="w-30 ">{{$key+1}}</li>
                        <li class="w-140 ">{{$item->question}}</li>
                        @if($item->is_correct)
                        <li class="w-30 text-green-500">Correct</li>
                        @else
                        <li class="w-30 text-red-500">Incorrect</li>
                        @endif
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>

</html>