<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Registration</title>
</head>

<body class="registration">
    <div class="container">
        <div class="form">
            <div class="toggle">
                <ul>
                    <li class="active" onclick="toggleForm('sign-up')" id="">Sign Up</li>
                    <li onclick="toggleForm('sign-in')">Sign In</li>
                </ul>
            </div>
            <div class="form-container">
                <div id="sign-up" class="form-section active">
                    <form action="{{ route('signUp') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your name">
                            @if ($errors->has('name'))
                                <div class="error-message">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password">
                @if ($errors->has('password'))
                    <div class="error-message">{{ $errors->first('password') }}</div>
                @endif
            </div>

        <div class="input-group">
            <label for="password">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password">
            @if ($errors->has('confirmPassword'))
                <div class="error-message">{{ $errors->first('confirmPassword') }}</div>
            @endif
        </div>

    <div class="input-group">
        <button type="submit">Sign Up</button>
    </div>
    </form>
    </div>
    <div id="sign-in" class="form-section">
        <form action="{{route('signIn')}}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email-login">Email</label>
                <input type="email" name="email-login" id="email-login" placeholder="Enter your email">
            </div>
            <div class="input-group">
                <label for="password-login">Password</label>
                <input type="password" name="password-login" id="password-login" placeholder="Enter your password">
            </div>
            <div class="input-group">
                <button type="submit">Sign In</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>

</body>
<script src="{{ asset('js/app.js') }}"></script>

</html>
