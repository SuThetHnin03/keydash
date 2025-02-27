@extends('user.layout.master')
@section('content')
    <!-- hero start -->
    <div class="hero">
        <h1 style="text-align: left; margin-left:35px; font-size:1.8rem;">Your Achievements</h1>
        <div class="grid-container">
            <div class="box box1">
                <ul>
                    @if ($best == null)
                        <li>« No such record yet!!! Please take some lessons »</li>
                    @else
                        <li>
                            <span style="color: #39D353;">WPM</span>
                            <span>

                                {{ str_replace('"', '', $best['wpm']) }}
                            </span>
                        </li>
                        <li>
                            <span style="color: #39D353;">Accuracy</span>
                            <span>

                                {{ round($best->accuracy, 2) }}%

                            </span>
                        </li>
                        <li>
                            <span style="color: #39D353;">Total Words</span>
                            <span>

                                {{ $best->total_words }}

                            </span>
                        </li>
                        <li>
                            <span style="color: #39D353;">Time</span>
                            <span>

                                {{ $best->duration }}

                            </span>
                        </li>
                        <li>
                            <span style="color: #39D353;">Typos</span>
                            <span>

                                {{ $best->typos }}
                            </span>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="box box2">
                <h5 style="margin-left:20px; color: #39D353; font-size:1.1rem; margin-bottom:10px;">Leaderboard</h5>
                <a href="{{ route('userLeaderboard') }}">
                    <table style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>EXP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users->take(5) as $index => $user)
                                @if ($user->total_exp > 0)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            {{ $user->total_exp }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </a>
            </div>

            <div class="box box3">
                <h1 style="width:100%; font-size: 2.3rem; color: #39D353; padding:0; text-align:left; margin-left:80px;">
                    Badges</h1>

                <div class="track">
                    <div class="tracker">
                        @php
                            $exps = $exps ?? 0; // Ensure $exps is set to 0 if it's null
                        @endphp

                        @switch(true)
                            @case($exps >= 0 && $exps <= 100)
                                <span>
                                    <img src="{{ asset('images/bronze.png') }}" alt="" width="50%">
                                </span>
                                <h5 style="font-size:1.3rem; width:100%; text-align: start; margin-left:80px;">Bronze</h5>
                                <input type="range" disabled name="" id="" value="{{ $exps }}"
                                    min="0" max="100">

                                <div class="" style="width:100%; text-align: end; margin-right:80px; ">
                                    <label for="">

                                        {{ $exps }}/100

                                    </label>
                                </div>
                            @break

                            @case($exps >= 101 && $exps <= 300)
                                <span>
                                    <img src="{{ asset('images/silver.png') }}" alt="" width="50%">
                                </span>
                                <h5>Silver</h5>
                                <input type="range" disabled name="" id="" value="{{ $exps }}"
                                    min="0" max="300">

                                <div class="" style="width:100%; text-align: end; margin-right:80px;">
                                    <label for="">

                                        {{ $exps }}/300

                                    </label>
                                </div>
                            @break

                            @case($exps >= 301 && $exps <= 500)
                                <span>
                                    <img src="{{ asset('images/gold.png') }}" alt="" width="50%">
                                </span>
                                <h5>Gold</h5>
                                <input type="range" disabled name="" id="" value="{{ $exps }}"
                                    min="0" max="500">

                                <div class="" style="width:100%; text-align: end; margin-right:80px;">
                                    <label for="">

                                        {{ $exps }}/500

                                    </label>
                                </div>
                            @break

                            @case($exps >= 501 && $exps <= 700)
                                <span>
                                    <img src="{{ asset('images/emerald.png') }}" alt="" width="50%">
                                </span>
                                <h5>Emerald</h5>
                                <input type="range" disabled name="" id="" value="{{ $exps }}"
                                    min="0" max="700">

                                <div class="" style="width:100%; text-align: end; margin-right:80px;">
                                    <label for="">

                                        {{ $exps }}/700

                                    </label>
                                </div>
                            @break

                            @case($exps >= 701 && $exps <= 1000)
                                <span>
                                    <img src="{{ asset('images/ruby.png') }}" alt="" width="50%">
                                </span>
                                <h5>Ruby</h5>
                                <input type="range" disabled name="" id="" value="{{ $exps }}"
                                    min="0" max="1000">
                                <div class="" style="width:100%; text-align: end; margin-right:80px;">
                                    <label for="">

                                        {{ $exps }}/1000

                                    </label>
                                </div>
                            @break

                            @case($exps >= 1001 && $exps <= 1300)
                                <span>
                                    <img src="{{ asset('images/sapphire.png') }}" alt="" width="50%">
                                </span>
                                <h5>Sapphire</h5>
                                <input type="range" disabled name="" id="" value="{{ $exps }}"
                                    min="0" max="1300">
                                <div class="" style="width:100%; text-align: end; margin-right:80px;">
                                    <label for="">

                                        {{ $exps }}/1300

                                    </label>
                                </div>
                            @break

                            @case($exps >= 1301 && $exps <= 1600)
                                <span>
                                    <img src="{{ asset('images/diamond.png') }}" alt="" width="50%">
                                </span>
                                <h5>Diamond</h5>
                                <input type="range" disabled name="" id="" value="{{ $exps }}"
                                    min="0" max="1600">

                                <div class="" style="width:100%; text-align: end; margin-right:80px;">
                                    <label for="">

                                        {{ $exps }}/1600

                                    </label>
                                </div>
                            @break

                            @default
                                <span>
                                    <img src="{{ asset('images/bronze.png') }}" alt="" width="50%">
                                </span>
                                <h5>Bronze</h5>
                                <input type="range" disabled name="" id="" value="{{ $exps }}"
                                    min="0" max="100">

                                <div class="" style="width:100%; text-align: end; margin-right:80px;">
                                    <label for="">

                                        {{ $exps }}/100

                                    </label>
                                </div>
                        @endswitch


                    </div>

                </div>
            </div>
            <div class="box box4">
                <canvas id="typingStatsChart"></canvas>

                <script>
                    let dailyScores = @json($dailyScores);

                    let yest_wpm = 0,
                        yest_accuracy = 0,
                        yest_total_words = 0,
                        yest_typos = 0,
                        today_wpm = 0,
                        today_accuracy = 0,
                        today_total_words = 0,
                        today_typos = 0



                    if (dailyScores.yesterday != null && dailyScores.today != null) {
                        yest_wpm = dailyScores.yesterday.wpm.replace(/"/g, "");
                        yest_accuracy = dailyScores.yesterday.accuracy;
                        yest_total_words = dailyScores.yesterday.total_words;
                        yest_typos = dailyScores.yesterday.typos;

                        today_wpm = dailyScores.today.wpm.replace(/"/g, "");
                        today_accuracy = dailyScores.today.accuracy;
                        today_total_words = dailyScores.today.total_words;
                        today_typos = dailyScores.today.typos;
                    } else if (dailyScores.yesterday != null && dailyScores.today == null) {

                        yest_wpm = dailyScores.yesterday.wpm.replace(/"/g, "");
                        yest_accuracy = dailyScores.yesterday.accuracy;
                        yest_total_words = dailyScores.yesterday.total_words;
                        yest_typos = dailyScores.yesterday.typos;

                        today_wpm = 0;
                        today_accuracy = 0;
                        today_total_words = 0;
                        today_typos = 0;

                    } else if (dailyScores.yesterday == null && dailyScores.today != null) {

                        yest_wpm = 0,
                            yest_accuracy = 0,
                            yest_total_words = 0,
                            yest_typos = 0,

                            today_wpm = dailyScores.today.wpm.replace(/"/g, "");
                        today_accuracy = dailyScores.today.accuracy;
                        today_total_words = dailyScores.today.total_words;
                        today_typos = dailyScores.today.typos;

                    } else {
                        yest_wpm = 0,
                            yest_accuracy = 0,
                            yest_total_words = 0,
                            yest_typos = 0,
                            today_wpm = 0,
                            today_accuracy = 0,
                            today_total_words = 0,
                            today_typos = 0
                    }


                    const ctx = document.getElementById('typingStatsChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['WPM', 'Accuracy', 'Total Words', 'Typos'],
                            datasets: [{
                                    label: 'Yesterday',
                                    data: [
                                        yest_wpm, // Add commas here
                                        yest_accuracy, // Add commas here
                                        yest_total_words, // Add commas here
                                        yest_typos // Add commas here
                                    ],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(255, 205, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(255, 159, 64)',
                                        'rgb(255, 205, 86)',
                                        'rgb(75, 192, 192)'
                                    ],
                                    borderWidth: 1
                                },
                                {
                                    label: 'Today',
                                    data: [
                                        today_wpm, // Add commas here
                                        today_accuracy, // Add commas here
                                        today_total_words, // Add commas here
                                        today_typos // Add commas here
                                    ],
                                    backgroundColor: [
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(201, 203, 207, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgb(75, 192, 192)',
                                        'rgb(54, 162, 235)',
                                        'rgb(153, 102, 255)',
                                        'rgb(201, 203, 207)'
                                    ],
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>


            </div>
            <div class="box box5">
                <h5 style="margin-left:20px; color: #39D353; font-size:1.1rem;">Your Rank</h5>
                <table style="width: 100%">
                    <tbody>
                        @foreach ($users as $index => $user)
                            @if ($user->id == auth()->user()->id)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->total_exp ?? 0 }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- hero end -->
@endsection
