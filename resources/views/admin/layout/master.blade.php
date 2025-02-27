<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('title')
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <style>
    .lessons{
        display: flex;
        flex-direction: column;
        align-items: center
    }
    textarea,option,select{
        background-color: #121212;
        padding: 5px 7px;
        border-radius: 7px;
        margin-top: 25px;
    }

    ul{
margin-top: 25px;
text-align: end;
margin-right: 50px;
    }

   </style>
</head>
<body>

    <ul>


            <li><form action="{{ route('signOut') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form></li>


    </ul>
    @yield('content')
</body>
<script src="{{asset('js/admin.js')}}"></script>
</html>
