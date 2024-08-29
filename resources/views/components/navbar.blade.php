<nav class="w-full px-5 h-20 bg-slate-500 flex justify-between items-center">
    <h1 class="text-white text-2xl font-semibold">
        <a href="{{ route('/') }}">Opening Account Nasabah</a>
    </h1>
    <ul class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md text-lg">
        @php
            $isLogin = Auth::check();    
        @endphp
        @if ($isLogin)
        <li><a href="{{ route('logout') }}">Logout</a></li>
        @else
        <li><a href="{{ route('/') }}">Login</a></li>
        @endif
    </ul>
</nav>