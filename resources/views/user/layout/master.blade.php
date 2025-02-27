<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Document</title>
</head>


<body>
    @php
        use App\Models\Friends;

        $friends = Friends::leftJoin('users', 'friends.from_id', '=', 'users.id')
            ->where('friends.to_id', auth()->user()->id)
            ->where('status','0')
            ->select('users.name', 'friends.*')
            ->get();
    @endphp

    <div class="popup" id="friendPopup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <div>
                <h3>Friend Requests</h3>
                <ul
                    style="display:flex; justify-content:space-between; margin:0px 7px; align-items:center; list-style:none; width:100%; margin-top:25px;">
                    @forelse($friends as $friend)
                        <li>
                            {{ $friend->name }}

                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="add({{$friend->id}})"><i data-feather="user-check" ></i></a>
                            <a href="javascript:void(0);" onclick="remove({{$friend->id}})"><i data-feather="user-x"></i></a>
                        </li>
                    @empty
                        <li>No friend requests.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <script>
        function add(id){
            var token = $('meta[name="csrf-token"]').attr('content');
            // Send the request using AJAX (jQuery)
            $.ajax({
                url: "{{ route('add') }}",
                type: "POST",
                data: {
                    id: id,
                    status : 1
                },
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function remove(id){
            var token = $('meta[name="csrf-token"]').attr('content');
            // Send the request using AJAX (jQuery)
            $.ajax({
                url: "{{ route('remove') }}",
                type: "POST",
                data: {
                    id: id,
                    status : 2
                },
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>

    <!-- nav start -->
    <div class="nav">
        <div class="nav-start">
            <p>Keydash</p>
        </div>
        <div class="nav-mid">
            <ul>
                <li><a href="{{ route('userHome') }}">Home</a></li>
                <li><a href="{{ route('userLessons') }}">Lessons</a></li>
                <li><a href="{{ route('userLeaderboard') }}">Leaderboard</a></li>
            </ul>
        </div>
        <div class="nav-end">
            <a href="" class="friend"><i data-feather="user-plus"></i></a>
            <a href="{{ route('profile') }}"><img src="{{ asset('images/user.png') }}" alt=""
                    class="profile"></a>
            <form action="{{ route('signOut') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    <!-- navend -->
    @yield('content')
</body>
<script src="{{ asset('js/keyboard.js') }}"></script>
<script>
    feather.replace();
    document.querySelector('.friend').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('friendPopup').classList.add('show');
    });

    document.querySelector('.popup .close').addEventListener('click', function() {
        document.getElementById('friendPopup').classList.remove('show');
    });

    // Optional: Close popup when clicking outside the content
    window.addEventListener('click', function(e) {
        const popup = document.getElementById('friendPopup');
        if (e.target === popup) popup.classList.remove('show');
    });
</script>

</html>
