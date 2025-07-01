<nav class="bg-white-600 rounded-md shadow-lg px-4 py-3 font-semibold">
    <div class="flex justify-between item-center">
        <div class="text-2xl font-bold text-shadow-sm text-green-800 hover:text-blue-500 cursor-pointer ">
            Quiz System
        </div>
        <div class=" space-x-3 text-shadow-xs ">
            <a class="text-green-700 hover:text-blue-500" href="/">Home</a>
            <a class="text-green-700 hover:text-blue-500" href="/categories-list">Categories</a>
            @if(session('user'))
            <a class="text-green-700 hover:text-blue-500" href="/user-details">Welcome ,{{session('user')->name}}</a>
            <a class="text-green-700 hover:text-blue-500" href="/user-logout">Logout</a>
            @else
            <a class="text-green-700 hover:text-blue-500" href="/user-login">Login</a>
            <a class="text-green-700 hover:text-blue-500" href="/user-signup">SignUp</a>
            @endif
            <a class="text-green-700 hover:text-blue-500" href="/">Blog</a>
        </div>
    </div>
</nav>