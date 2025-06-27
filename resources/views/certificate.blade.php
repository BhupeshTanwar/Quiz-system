<!DOCTYPE html>
<html lang="en">

<head>
    <title>Certificate</title>
    @vite('resources/css/app.css')
</head>

<body class="pt-10 text-center ">
    <a class="text-green-500 font-bold" href="/">Download</a>
    <div class="w-200 border-4 m-10 bg-grey-100 border-indigo-900 p-10 text-center ">
        
        <h1 class="text-5xl flex ml-10"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFD700">
                <path d="m387-412 35-114-92-74h114l36-112 36 112h114l-93 74 35 114-92-71-93 71ZM240-40v-309q-38-42-59-96t-21-115q0-134 93-227t227-93q134 0 227 93t93 227q0 61-21 115t-59 96v309l-240-80-240 80Zm240-280q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70ZM320-159l160-41 160 41v-124q-35 20-75.5 31.5T480-240q-44 0-84.5-11.5T320-283v124Zm160-62Z" />
            </svg>
            <span>Certificate of complicaton</span>
        </h1>
        <p class="text-2xl mt-5">This is clarify data</p>
        <h2 class="text-4xl">Bhupesh Saini</h2>
        <p class="text-2xl mt-3">has successfully completed the</p>
        <h3 class="text-3xl text-indigo-900">Laravel Internship</h3>
        <p class="text-2xl mt-5">{{date('y-m-d')}}</p>
    </div>
</body>

</html>