<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <h1>
        Admin
    </h1>
    <ul>
        <a href="{{route('redirectAddLessons')}}">
            <li>Lessons</li>
        </a>
        <a href="">
            <li><form action="{{ route('signOut') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form></li>
        </a>
        <a href="">
            <li></li>
        </a>
    </ul>
    @yield('content')
</body>
<script src="{{asset('js/admin.js')}}"></script>
</html>
