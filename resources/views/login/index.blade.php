<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex w-full justify-center items-center min-h-screen">
        @php
             $isLogin = Auth::check(); 
             
        @endphp
        @if ($isLogin)
        @php
            $user = Auth::user();
        @endphp
            @if ($user->hasRole('supervisor'))
            <script>window.location = "/supervisor/home";</script>
            @elseif($user->hasRole('customer service'))
            <script>window.location = "/cs/home";</script>   
            @endif
        @endif
        <div class="login-box flex flex-col gap-10 max-w-[600px] w-full px-10 py-12 rounded-md shadow-xl drop-shadow-xl border border-slate-300">
            <h2 class="text-3xl font-bold text-slate-700 text-center">Login</h2>
            @if ($errors->any())
                <div class="alert alert-error bg-red-200 py-2 px-4 rounded-md">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
                @csrf
                <div class="form-group grid grid-cols-4 items-center ">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="col-span-3">
                </div>
                <div class="form-group grid grid-cols-4 items-center">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required class="col-span-3">
                </div>
                <button type="submit" class="btn-login bg-blue-500 w-full py-2 text-xl text-white">Login</button>
            </form>
        </div>
    </div>

    <script>
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
</body>
</html>
