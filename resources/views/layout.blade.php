<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
    @include('components.navbar')
    <div class="w-full px-10 py-5  overflow-x-auto">
        @yield('content')
    </div>
    
</body>
</html>