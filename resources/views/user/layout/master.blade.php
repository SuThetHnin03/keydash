<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>

<body>
    <!-- nav start -->
    <div class="nav">
        <div class="nav-start">
            <p>Keydash</p>
        </div>
        <div class="nav-mid">
            <ul>
                <li><a href="{{route('userHome')}}">Home</a></li>
                <li><a href="{{route('userLessons')}}">Lessons</a></li>
                <li><a href="{{route('userChallenges')}}">Challenges</a></li>
            </ul>
        </div>
        <div class="nav-end">
            <img src="{{asset('images/user.png')}}" alt="" class="profile">
            <form action="{{ route('signOut') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    <!-- navend -->
    @yield('content')
</body>
<script src="{{asset('js/keyboard.js')}}"></script>
</html>
