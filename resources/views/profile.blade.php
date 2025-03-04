<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Profile Page</title>
</head>

<body>
    <div class="back-arrow">
        <a href="{{ url()->previous() }}"> <i data-feather="arrow-left"></i></a>
    </div>
    <div class="profilePage">
        <div class="profile-left">
            <!-- Profile Edit Button -->
            <div class="profile-edit">
                @if (auth()->user() && auth()->user()->id === $user->id)
                    <!-- If the logged-in user is viewing their own profile -->
                    <i data-feather="edit" onclick="openModal()"></i> <!-- Edit icon for own profile -->
                @else
                    <!-- If the logged-in user is viewing another user's profile -->
                    <i data-feather="plus" onclick="addConnection({{ $user->id }})"></i>
                    <!-- Plus icon for others' profiles -->
                @endif
            </div>


            <!-- Profile Image and Data -->
            <div class="profile-image">
                @if ($user->profile == null)
                    <img id="output" src="{{ asset('images/user.png') }}" alt="Profile Image">
                @elseif ($user->profile != null)
                    <img id="output" src="{{ asset('uploads/profile_images/' . $user->profile) }}"
                        alt="Profile Image">
                @endif

            </div>

            <div class="profile-infos" style="margin-top:50px;">
                <ul>
                    <li><span>Name:</span> <span id="profileName">{{ $user->name }}</span></li>
                    <li><span>Mail:</span> {{ $user->email }}</li>
                </ul>
            </div>
            <div class="social-media" style="margin-top:50px;">
                <ul>
                    <li>
                        <i data-feather="facebook"></i>
                        <span>Rate Us</span>
                    </li>
                    <li>
                        <i data-feather="instagram"></i>
                        <span>Follow me!</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="profile-right">
            <h1>Your Rank</h1>

            <div class="profile-badges">
                @foreach (['bronze', 'silver', 'gold', 'emerald', 'ruby', 'sapphire', 'diamond'] as $index => $badge)
                    @php
                        $expThresholds = [0, 100, 300, 500, 700, 1000, 1300, 1600];
                        $expRequired = $expThresholds[$index];
                        $nextExpRequired = $expThresholds[$index + 1] ?? $expThresholds[$index]; // Use the next threshold for the max
                    @endphp
                    <div class="{{ $badge }}">
                        <div class="cover {{ $exps < $expRequired ? 'locked' : 'unlocked' }}">
                            <i data-feather="lock"></i>
                        </div>

                        <img src="{{ asset('images/' . $badge . '.png') }}" alt="" width="50%"
                            style="margin-top:10px;">
                        <h5>{{ ucfirst($badge) }}</h5>
                        <input type="range" value="{{ $exps }}" min="0" max="{{ $nextExpRequired }}"
                            disabled>
                        <span>{{ $exps }}/{{ $nextExpRequired }}</span>
                    </div>
                @endforeach

            </div>


            <div class="analysis">
                <div class="id">
                    <h2 style="color:#39D353;">ID</h2>
                    <h3 style="margin-top: 15px; text-align:center;">{{ $user->user_code }}</h3>
                </div>
                <div class="joined">
                    <h2 style="color:#39D353;">Joined</h2>
                    <h3 style="margin-top: 15px; text-align:center;">{{ $user->created_at->format('Y-m-d') }}</h3>
                </div>
                <div class="exps">
                    <h2 style="color:#39D353;">Total Exps</h2>
                    <h3 style="margin-top: 15px; text-align:center;">{{ $exps ?? 0 }}</h3>
                </div>
                <div class="analysict">
                    <canvas id="typingStatsChart"></canvas>

                    <script>
                        let yesterdayBest = @json($yesterdayBest);
                        let todayBest = @json($todayBest);


                        let yest_wpm = 0,
                            yest_accuracy = 0,
                            yest_total_words = 0,
                            yest_typos = 0,
                            today_wpm = 0,
                            today_accuracy = 0,
                            today_total_words = 0,
                            today_typos = 0



                        if (yesterdayBest != null && todayBest != null) {
                            yest_wpm = yesterdayBest.wpm.replace(/"/g, "");
                            yest_accuracy = yesterdayBest.accuracy;
                            yest_total_words = yesterdayBest.total_words;
                            yest_typos = yesterdayBest.typos;

                            today_wpm = todayBest.wpm.replace(/"/g, "");
                            today_accuracy = todayBest.accuracy;
                            today_total_words = todayBest.total_words;
                            today_typos = todayBest.typos;
                        } else if (yesterdayBest != null && todayBest == null) {

                            yest_wpm = yesterdayBest.wpm.replace(/"/g, "");
                            yest_accuracy = yesterdayBest.accuracy;
                            yest_total_words = yesterdayBest.total_words;
                            yest_typos = yesterdayBest.typos;

                            today_wpm = 0;
                            today_accuracy = 0;
                            today_total_words = 0;
                            today_typos = 0;

                        } else if (yesterdayBest == null && todayBest != null) {

                            yest_wpm = 0,
                                yest_accuracy = 0,
                                yest_total_words = 0,
                                yest_typos = 0,

                                today_wpm = todayBest.wpm.replace(/"/g, "");
                            today_accuracy = todayBest.accuracy;
                            today_total_words = todayBest.total_words;
                            today_typos = todayBest.typos;

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
                <div class="friends" style="display: flex;">
                    @if (!empty($friends))
                        @foreach ($friends as $f)
                            <div class="account" style="margin-right:50px;">
                                @if ($f->profile != null)
                                    <img src="{{ asset('uploads/profile_images/' . $f->profile) }}" alt=""
                                        width="50px" height="50px"
                                        style="object-position: center; border-radius:25px;">
                                @else
                                    <img src="{{ asset('images/user.png') }}" alt="" width="50px"
                                        height="50px" style="object-position: center; border-radius:25px;">
                                @endif
                                <p>{{ $f->name }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>No Friend Yet</p>
                    @endif
                </div>
                <div class="top3">
                    <h2>Top 5</h2>
                    <a href="{{ route('userLeaderboard') }}">
                        <table style="width:100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: end; padding-right:15px;">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users->take(5) as $index => $user)
                                    @if ($user->total_exp > 0)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td style="text-align: end">{{ $user->name }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Profile Edit -->
    <div id="profileModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Profile</h2>
            <hr>
            <form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                @csrf
                <div class="img">
                    <img id="outputImagePreview" style="width: 150px; height: 150px; border-radius: 50%;"
                        src="../images/user.png" alt="Image Preview">
                    <br><br>

                    <input type="file" name="image" id="profileImage" onchange="loadFile(event)">
                    <br><br>
                </div>

                <div class="others">
                    <label for="name">Name:</label>
                    <input type="text" id="editName" name="name" value="{{ $user->name }}"
                        style="color: black;"><br><br>

                    <label for="name">Email:</label>
                    <input type="text" id="" disabled value="{{ $user->email }}"><br><br>
                    <button type="submit" onclick="saveProfile()">Save Changes</button>
                </div>


            </form>
        </div>
    </div>

    <script>
        feather.replace();

        // Open the modal
        function openModal() {
            document.getElementById('profileModal').style.display = 'block';
        }

        // Close the modal
        function closeModal() {
            document.getElementById('profileModal').style.display = 'none';
        }

        // Update the image preview when a file is selected
        function loadFile(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('outputImagePreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // Save the changes (this is where you'd save the data to the server)
        function saveProfile() {
            var name = document.getElementById('editName').value;
            // In reality, you would send the updated name and image to your server here
            document.getElementById('profileName').innerText = name;

            // Simulating the save operation and closing the modal
            closeModal();
        }

        function addConnection(userId) {
            var token = $('meta[name="csrf-token"]').attr('content');
            // Send the request using AJAX (jQuery)
            $.ajax({
                url: "{{ route('addConnection') }}",
                type: "POST",
                data: {
                    to_id: userId,
                    from_id: {{ auth()->user()->id }}
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

            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Add Friend Succefully",
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>

</body>

</html>
