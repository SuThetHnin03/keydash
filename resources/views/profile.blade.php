<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="back-arrow">
        <i data-feather="arrow-left"></i>
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

                <h5>8 <span>friends</span></h5>
            </div>
            <div class="daily-infos">
                <div class="streak">
                    <i data-feather="heart"></i>
                    <p>4 <span>days</span></p>
                </div>
                <div class="ranks">
                    <i data-feather="bar-chart"></i>
                    <p>5 <span>rank</span></p>
                </div>
            </div>
            <div class="profile-infos">
                <ul>
                    <li><span>Name:</span> <span id="profileName">{{ $user->name }}</span></li>
                    <li><span>Mail:</span> {{ $user->email }}</li>
                </ul>
            </div>
            <div class="social-media">
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
                <div class="bronze">
                    <div class="cover" @if ($exps >= 0 && $exps <= 200) style="display: none" @endif>
                        <i data-feather="lock"></i>
                    </div>
                    <img src="{{ asset('images/bronze.png') }}" alt="" width="50%" style="margin-top:10px;">
                    <h5>Bronze</h5>
                    <input type="range" name="" id="" value="{{ $exps }}" min="0"
                        max="100">
                    <span>{{ $exps }}/200</span>
                </div>
                <div class="silver">
                    <div class="cover" @if ($exps >= 201 && $exps <= 300) style="display: none" @endif>
                        <i data-feather="lock"></i>
                    </div>
                    <img src="{{ asset('images/silver.png') }}" alt="" width="50%" style="margin-top:10px;">
                    <h5>Silver</h5>
                    <input type="range" name="" id="" value="{{ $exps }}" min="0"
                        max="300">
                    <span>{{ $exps }}/300</span>
                </div>
                <div class="gold">
                    <div class="cover" @if ($exps >= 301 && $exps <= 500) style="display: none" @endif>
                        <i data-feather="lock"></i>
                    </div>
                    <img src="{{ asset('images/gold.png') }}" alt="" width="50%" style="margin-top:10px;">
                    <h5>Gold</h5>
                    <input type="range" name="" id="" value="{{ $exps }}" min="0"
                        max="500">
                    <span>{{ $exps }}/500</span>
                </div>
                <div class="emerald">
                    <div class="cover" @if ($exps >= 501 && $exps <= 700) style="display: none" @endif>
                        <i data-feather="lock"></i>
                    </div>
                    <img src="{{ asset('images/emerald.png') }}" alt="" width="50%"
                        style="margin-top:10px;">
                    <h5>Emerald</h5>
                    <input type="range" name="" id="" value="{{ $exps }}" min="0"
                        max="700">
                    <span>{{ $exps }}/700</span>
                </div>
                <div class="ruby">
                    <div class="cover" @if ($exps >= 701 && $exps <= 1000) style="display: none" @endif>
                        <i data-feather="lock"></i>
                    </div>
                    <img src="{{ asset('images/ruby.png') }}" alt="" width="50%" style="margin-top:10px;">
                    <h5>Ruby</h5>
                    <input type="range" name="" id="" value="{{ $exps }}" min="0"
                        max="1000">
                    <span>{{ $exps }}/1000</span>
                </div>
                <div class="sapphire">
                    <div class="cover" @if ($exps >= 1001 && $exps <= 1300) style="display: none" @endif>
                        <i data-feather="lock"></i>
                    </div>
                    <img src="{{ asset('images/sapphire.png') }}" alt="" width="50%"
                        style="margin-top:10px;">
                    <h5>Sapphire</h5>
                    <input type="range" name="" id="" value="{{ $exps }}" min="0"
                        max="1300">
                    <span>{{ $exps }}/1300</span>
                </div>
                <div class="diamond">
                    <div class="cover" @if ($exps >= 1301 && $exps <= 1600) style="display: none" @endif>
                        <i data-feather="lock"></i>
                    </div>
                    <img src="{{ asset('images/diamond.png') }}" alt="" width="50%"
                        style="margin-top:10px;">
                    <h5>Diamond</h5>
                    <input type="range" name="" id="" value="{{ $exps }}" min="0"
                        max="1600">
                    <span>{{ $exps }}/1600</span>
                </div>
            </div>

            <div class="analysis">
                <div class="id">
                    <h2>ID</h2>
                    <h1>{{ $user->user_code }}</h1>
                </div>
                <div class="joined">
                    <h2>Joined</h2>
                    <h1>{{ $user->created_at->format('Y-m-d') }}</h1>
                </div>
                <div class="exps">
                    <h2>Total Exps</h2>
                    <h1>{{ $user->total_exp }}</h1>
                </div>
                <div class="analysict">
                    <h2>

                    </h2>
                </div>
                <div class="friends">
                    e
                </div>
                <div class="top3">
                    <h2>Top 3</h2>
                    <h1>-</h1>
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
                    <input type="text" id="editName" name="name" value="{{ $user->name }}"><br><br>

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
                    from_id: {{auth()->user()->id}}
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

</body>

</html>
