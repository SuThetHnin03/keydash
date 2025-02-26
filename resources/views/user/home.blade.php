@extends('user.layout.master')
@section('content')
    <!-- hero start -->
    <div class="hero">
        <h1>Your Achievements</h1>
        <div class="grid-container">
            <div class="box box1">
                <ul>
                    @if ($best == null)
                        <li>NO such record yet</li>
                    @else
                        <li>
                            <span>WPM</span>
                            <span>

                                {{ str_replace('"', '', $best['wpm']) }}
                            </span>
                        </li>
                        <li>
                            <span>Accuracy</span>
                            <span>

                                {{ round($best->accuracy, 2) }}%

                            </span>
                        </li>
                        <li>
                            <span>Total Words</span>
                            <span>

                                {{ $best->total_words }}

                            </span>
                        </li>
                        <li>
                            <span>Time</span>
                            <span>

                                {{ $best->duration }}

                            </span>
                        </li>
                        <li>
                            <span>Typos</span>
                            <span>

                                {{ $best->typos }}
                            </span>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="box box2">
                <a href="{{route('userLeaderboard')}}">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>EXP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users->take(3) as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->total_exp }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </a>
            </div>

            <div class="box box3">
                <h1>Badges</h1>

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
                                <h5>Bronze</h5>
                                <input type="range" name="" id="" value="{{ $exps }}" min="0"
                                    max="100">

                        <label for="">

                            {{ $exps }}/100

                        </label>
                            @break

                            @case($exps >= 101 && $exps <= 300)
                                <span>
                                    <img src="{{ asset('images/silver.png') }}" alt="" width="50%">
                                </span>
                                <h5>Silver</h5>
                                <input type="range" name="" id="" value="{{ $exps }}" min="0"
                                    max="300">

                        <label for="">

                            {{ $exps }}/300

                        </label>
                            @break

                            @case($exps >= 301 && $exps <= 500)
                                <span>
                                    <img src="{{ asset('images/gold.png') }}" alt="" width="50%">
                                </span>
                                <h5>Gold</h5>
                                <input type="range" name="" id="" value="{{ $exps }}" min="0"
                                    max="500">

                        <label for="">

                            {{ $exps }}/500

                        </label>
                            @break

                            @case($exps >= 501 && $exps <= 700)
                                <span>
                                    <img src="{{ asset('images/emerald.png') }}" alt="" width="50%">
                                </span>
                                <h5>Emerald</h5>
                                <input type="range" name="" id="" value="{{ $exps }}" min="0"
                                    max="700">

                        <label for="">

                            {{ $exps }}/700

                        </label>
                            @break

                            @case($exps >= 701 && $exps <= 1000)
                                <span>
                                    <img src="{{ asset('images/ruby.png') }}" alt="" width="50%">
                                </span>
                                <h5>Ruby</h5>
                                <input type="range" name="" id="" value="{{ $exps }}" min="0"
                                    max="1000">

                        <label for="">

                            {{ $exps }}/1000

                        </label>
                            @break

                            @case($exps >= 1001 && $exps <= 1300)
                                <span>
                                    <img src="{{ asset('images/sapphire.png') }}" alt="" width="50%">
                                </span>
                                <h5>Sapphire</h5>
                                <input type="range" name="" id="" value="{{ $exps }}" min="0"
                                    max="1300">

                        <label for="">

                            {{ $exps }}/1300

                        </label>
                            @break

                            @case($exps >= 1301 && $exps <= 1600)
                                <span>
                                    <img src="{{ asset('images/diamond.png') }}" alt="" width="50%">
                                </span>
                                <h5>Diamond</h5>
                                <input type="range" name="" id="" value="{{ $exps }}" min="0"
                                    max="1600">

                        <label for="">

                            {{ $exps }}/1600

                        </label>
                            @break

                            @default
                                <span>
                                    <img src="{{ asset('images/bronze.png') }}" alt="" width="50%">
                                </span>
                                <h5>Bronze</h5>
                                <input type="range" name="" id="" value="{{ $exps }}" min="0"
                                    max="100">

                        <label for="">

                            {{ $exps }}/100

                        </label>
                        @endswitch


                    </div>
                    <div class="rank">

                    </div>
                </div>
            </div>
            <div class="box box4">a</div>
            <div class="box box5">
                <h5>Your Rank</h5>
                <table>
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
