@extends('user.layout.master')
@section('content')
    <div class="leaderboard">
        <div class="leaderboard-left">
            <div class="topThree">
                <h3>Top 3 This Week</h3>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Players</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users->take(3) as $index => $user)

                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td style="display:flex; align-items:center; justify-content: space-between; text-align: left;">
                                    <a href="{{route('friendProfile', $user->id)}}">
                                    @if ($user->profile != null)
                                    <img src="{{ asset('uploads/profile_images/' . $user->profile) }}" alt=""
                                        width="25px" height="25px"
                                        style="border-radius: 25px; object-position:center;">
                                @else
                                    <img src="{{ asset('images/user.png') }}" alt="" width="25px"
                                        height="25px" style="border-radius: 25px; object-position:center;">
                                @endif
                                    {{ $user->name }}
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="you">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Players</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            @if ($user->id == auth()->user()->id)

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td style="display:flex; align-items:center; justify-content: space-evenly;">
                                        @if ($user->profile != null)
                                            <img src="{{ asset('uploads/profile_images/' . $user->profile) }}" alt=""
                                                width="25px" height="25px"
                                                style="border-radius: 25px; object-position:center;">
                                        @else
                                            <img src="{{ asset('images/user.png') }}" alt="" width="25px"
                                                height="25px" style="border-radius: 25px; object-position:center;">
                                        @endif
                                        {{ $user->name }}
                                    </td>
                                </tr>

                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="leaderboard-right">
            <div class="title">
                <h3>Leaderboard</h3>
                <input type="search" name="search" id="searchInput" placeholder="Search players...">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Players</th>
                        <th>Exp</th>
                    </tr>
                </thead>
                <tbody id="leaderboardBody">
                    @foreach ($users->take(10) as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td style="display:flex; align-items:center; justify-content: space-evenly;">
                                @if ($user->profile != null)
                                <img src="{{ asset('uploads/profile_images/' . $user->profile) }}" alt=""
                                    width="25px" height="25px"
                                    style="border-radius: 25px; object-position:center;">
                            @else
                                <img src="{{ asset('images/user.png') }}" alt="" width="25px"
                                    height="25px" style="border-radius: 25px; object-position:center;">
                            @endif
                                {{ $user->name }}</td>
                            <td>{{ $user->total_exp }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#leaderboardBody tr');

            rows.forEach(row => {
                let playerName = row.cells[1].textContent.toLowerCase();
                row.style.display = playerName.includes(filter) ? '' : 'none';
            });
        });
    </script>
@endsection
