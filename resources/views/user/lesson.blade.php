@extends('user.layout.master')
@section('content')
    <style>
        .challenge .lessons {
            display: flex;
        }

        .challenge .lessons .lesson {
            width: 25px;
            height: 3px;
            margin-right: 7px;
            background-color: rgb(197, 197, 197);
        }
    </style>

    <div class="challenge">
        <div class="lessons">
            <span class="lesson" id="one"></span>
            <span class="lesson" id="two"></span>
            <span class="lesson" id="three"></span>
            <span class="lesson" id="four"></span>
            <span class="lesson" id="five"></span>
        </div>
        <div class="track">
            <div class="keys">
                <span>Keys:</span>
                <ul id="lesson-keys" style="color: white">

                </ul>
            </div>
            <div class="tracks">
                <ul>
                    <li><span id="wpm">0</span>wpm</li>
                    <li><span id="time">00:00</span></li>
                    <li><span id="mistakes">0</span>mistakes</li>
                </ul>
            </div>
        </div>

        <div class="typing">
            <div class="text">
                <span id="lesson_display" contenteditable="true">No Lesson Yet</span>
            </div>
            <div class="keyboard">
                <div class="keyboard__row keyboard__row--h1">
                    <div data-key="27" class="key--word">
                        <span>esc</span>
                    </div>
                    <div data-key="112" class="key--fn">
                        <span>F1</span>
                    </div>
                    <div data-key="113" class="key--fn">
                        <span>F2</span>
                    </div>
                    <div data-key="114" class="key--fn">
                        <span>F3</span>
                    </div>
                    <div data-key="115" class="key--fn">
                        <span>F4</span>
                    </div>
                    <div data-key="116" class="key--fn">
                        <span>F5</span>
                    </div>
                    <div data-key="117" class="key--fn">
                        <span>F6</span>
                    </div>
                    <div data-key="118" class="key--fn">
                        <span>F7</span>
                    </div>
                    <div data-key="119" class="key--fn">
                        <span>F8</span>
                    </div>
                    <div data-key="120" class="key--fn">
                        <span>F9</span>
                    </div>
                    <div data-key="121" class="key--fn">
                        <span>F10</span>
                    </div>
                    <div data-key="122" class="key--fn">
                        <span>F11</span>
                    </div>
                    <div data-key="123" class="key--fn">
                        <span>F12</span>
                    </div>
                    <div data-key="n/a" class="key--word">
                        <span>pwr</span>
                    </div>
                </div>
                <div class="keyboard__row">
                    <div class="key--double" data-key="192">
                        <div>~</div>
                        <div>`</div>
                    </div>
                    <div class="key--double" data-key="49">
                        <div>!</div>
                        <div>1</div>
                    </div>
                    <div class="key--double" data-key="50">
                        <div>@</div>
                        <div>2</div>
                    </div>
                    <div class="key--double" data-key="51">
                        <div>#</div>
                        <div>3</div>
                    </div>
                    <div class="key--double" data-key="52">
                        <div>$</div>
                        <div>4</div>
                    </div>
                    <div class="key--double" data-key="53">
                        <div>%</div>
                        <div>5</div>
                    </div>
                    <div class="key--double" data-key="54">
                        <div>^</div>
                        <div>6</div>
                    </div>
                    <div class="key--double" data-key="55">
                        <div>&</div>
                        <div>7</div>
                    </div>
                    <div class="key--double" data-key="56">
                        <div>*</div>
                        <div>8</div>
                    </div>
                    <div class="key--double" data-key="57">
                        <div>(</div>
                        <div>9</div>
                    </div>
                    <div class="key--double" data-key="48">
                        <div>)</div>
                        <div>0</div>
                    </div>
                    <div class="key--double" data-key="189">
                        <div>_</div>
                        <div>-</div>
                    </div>
                    <div class="key--double" data-key="187">
                        <div>+</div>
                        <div>=</div>
                    </div>
                    <div class="key--bottom-right key--word key--w4" data-key="8">
                        <span>delete</span>
                    </div>
                </div>
                <div class="keyboard__row">
                    <div class="key--bottom-left key--word key--w4" data-key="9">
                        <span>tab</span>
                    </div>
                    <div class="key--letter" data-char="Q">Q</div>
                    <div class="key--letter" data-char="W">W</div>
                    <div class="key--letter" data-char="E">E</div>
                    <div class="key--letter" data-char="R">R</div>
                    <div class="key--letter" data-char="T">T</div>
                    <div class="key--letter" data-char="Y">Y</div>
                    <div class="key--letter" data-char="U">U</div>
                    <div class="key--letter" data-char="I">I</div>
                    <div class="key--letter" data-char="O">O</div>
                    <div class="key--letter" data-char="P">P</div>
                    <div class="key--double" data-key="219" data-char="{[">
                        <div>{</div>
                        <div>[</div>
                    </div>
                    <div class="key--double" data-key="221" data-char="}]">
                        <div>}</div>
                        <div>]</div>
                    </div>
                    <div class="key--double" data-key="220"
                        data-char="|\">
                    <div>|</div>
                    <div>\</div>
                </div>
            </div>
            <div class="keyboard__row">
                        <div class="key--bottom-left key--word key--w5" data-key="20">
                            <span>caps lock</span>
                        </div>
                        <div class="key--letter" data-char="A">A</div>
                        <div class="key--letter" data-char="S">S</div>
                        <div class="key--letter" data-char="D">D</div>
                        <div class="key--letter" data-char="F">F</div>
                        <div class="key--letter" data-char="G">G</div>
                        <div class="key--letter" data-char="H">H</div>
                        <div class="key--letter" data-char="J">J</div>
                        <div class="key--letter" data-char="K">K</div>
                        <div class="key--letter" data-char="L">L</div>
                        <div class="key--double" data-key="186">
                            <div>:</div>
                            <div>;</div>
                        </div>
                        <div class="key--double" data-key="222">
                            <div>"</div>
                            <div>'</div>
                        </div>
                        <div class="key--bottom-right key--word key--w5" data-key="13">
                            <span>return</span>
                        </div>
                    </div>
                    <div class="keyboard__row">
                        <div class="key--bottom-left key--word key--w6" data-key="16">
                            <span>shift</span>
                        </div>
                        <div class="key--letter" data-char="Z">Z</div>
                        <div class="key--letter" data-char="X">X</div>
                        <div class="key--letter" data-char="C">C</div>
                        <div class="key--letter" data-char="V">V</div>
                        <div class="key--letter" data-char="B">B</div>
                        <div class="key--letter" data-char="N">N</div>
                        <div class="key--letter" data-char="M">M</div>
                        <div class="key--double" data-key="188">
                            <div>&lt;</div>
                            <div>,</div>
                        </div>
                        <div class="key--double" data-key="190">
                            <div>&gt;</div>
                            <div>.</div>
                        </div>
                        <div class="key--double" data-key="191">
                            <div>?</div>
                            <div>/</div>
                        </div>
                        <div class="key--bottom-right key--word key--w6" data-key="16-R">
                            <span>shift</span>
                        </div>
                    </div>
                    <div class="keyboard__row keyboard__row--h3">
                        <div class="key--bottom-left key--word">
                            <span>fn</span>
                        </div>
                        <div class="key--bottom-left key--word key--w1" data-key="17">
                            <span>control</span>
                        </div>
                        <div class="key--bottom-left key--word key--w1" data-key="18">
                            <span>option</span>
                        </div>
                        <div class="key--bottom-right key--word key--w3" data-key="91">
                            <span>command</span>
                        </div>
                        <div class="key--double key--right key--space" data-key="32" data-char=" ">
                            &nbsp;
                        </div>
                        <div class="key--bottom-left key--word key--w3" data-key="93-R">
                            <span>command</span>
                        </div>
                        <div class="key--bottom-left key--word key--w1" data-key="18-R">
                            <span>option</span>
                        </div>
                        <div data-key="37" class="key--arrow">
                            <span>&#9664;</span>
                        </div>
                        <div class="key--double key--arrow--tall" data-key="38">
                            <div>&#9650;</div>
                            <div>&#9660;</div>
                        </div>
                        <div data-key="39" class="key--arrow">
                            <span>&#9654;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                let progressBar = document.querySelector("#progress");
                let lesson_display = document.querySelector("#lesson_display");
                let mistakes_display = document.querySelector("#mistakes");
                let wpm_display = document.querySelector("#wpm");
                let time_display = document.querySelector("#time");

                // Normalize the lessons data
                const lessons = normalizeLessons(@json($lesson));
                console.log("Normalized Lessons:", lessons);

                let lessonIndex = 0;
                let typedText = "";
                let formattedTime = "";
                let startTime, endTime;
                let totalCharactersTyped = 0;
                let mistakes = 0;
                let accuracy;
                let time;
                let timerInterval;
                let total_exp = 0;

                const pathParts = window.location.pathname.split('/');
                const lessonId = pathParts[3];

                // Set total_exp based on lessonId
                if (lessonId == 1) {
                    total_exp = 5;
                } else if (lessonId == 2) {
                    total_exp = 10;
                } else if (lessonId == 3) {
                    total_exp = 15;
                } else if (lessonId == 4) {
                    total_exp = 20;
                } else if (lessonId == 5) {
                    total_exp = 25;
                }

                console.log("Lessons:", lessons);

                // Make the lesson display editable and focusable
                lesson_display.setAttribute("contenteditable", "true");
                lesson_display.setAttribute("tabindex", "0");
                lesson_display.focus();

                // Normalize lessons data to handle both array and object formats
                function normalizeLessons(data) {
                    if (Array.isArray(data)) {
                        return data; // Already an array, return as-is
                    } else if (typeof data === 'object') {
                        return Object.values(data); // Convert object to array
                    }
                    return []; // Fallback for invalid data
                }

                // Update the lesson keys display
                function updateLessonKeys() {
                    let lessonKey = document.querySelector("#lesson-keys");
                    let lessons_text = lessons[lessonIndex].lesson;

                    // Clear the current lesson key display
                    lessonKey.innerHTML = '';

                    // Remove spaces and split the lesson text into unique characters
                    let lessonKeys = new Set(lessons_text.replace(/\s/g, '').split(''));

                    // Create and append each unique key as a list item
                    lessonKeys.forEach((key) => {
                        let li = document.createElement("li");
                        li.textContent = key;
                        lessonKey.appendChild(li);
                    });
                }

                // Check for mistakes in the typed text
                function checkMistakes() {
                    let lessonText = lessons[lessonIndex].lesson.repeat(5);
                    let mistakeCount = 0;

                    // Count mistakes in typedText
                    for (let i = 0; i < typedText.length; i++) {
                        if (typedText[i] !== lessonText[i]) {
                            mistakeCount++;
                        }
                    }

                    mistakes = mistakeCount;
                    mistakes_display.textContent = mistakes;
                    accuracy = ((typedText.length - mistakes) / typedText.length) * 100;
                }

                // Update the WPM (Words Per Minute) display
                function updateWPM() {
                    totalCharactersTyped = typedText.length;
                    let timeInMinutes = (new Date() - startTime) / 60000;

                    if (timeInMinutes <= 0) {
                        wpm_display.textContent = 0;
                        return;
                    }

                    // Divide characters by 5 (average word length) and divide by time in minutes
                    let wpm = Math.round((totalCharactersTyped / 5) / timeInMinutes);
                    wpm_display.textContent = wpm;
                }

                // Start the timer
                function startTimer() {
                    startTime = new Date();
                    timerInterval = setInterval(() => {
                        let timeDiff = new Date() - startTime;
                        let seconds = Math.floor(timeDiff / 1000);
                        updateTimeDisplay(seconds);
                        updateWPM();
                    }, 1000);
                }

                // End the timer
                function endTimer() {
                    clearInterval(timerInterval);
                    let timeDiff = new Date() - startTime;
                    let seconds = Math.floor(timeDiff / 1000);
                    updateTimeDisplay(seconds);
                    updateWPM();
                }

                // Update the time display
                function updateTimeDisplay(seconds) {
                    let minutes = Math.floor(seconds / 60);
                    let remainingSeconds = seconds % 60;
                    formattedTime = `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
                    time_display.textContent = formattedTime;
                }

                // Set the current lesson
                function setLesson(index) {
                    if (index >= lessons.length) {
                        alert("All lessons completed!");
                        return;
                    }

                    let currentLesson = lessons[index];
                    if (!currentLesson) {
                        console.error("Lesson not found for index:", index);
                        return;
                    }

                    lesson_display.innerHTML = currentLesson.lesson.repeat(5);
                    typedText = "";
                    highlightLesson(index);
                    updateLessonKeys();
                }

                // Highlight the current lesson in the progress bar
                function highlightLesson(index) {
                    let elements = [one, two, three, four, five];
                    elements.forEach((el, i) => {
                        el.style.backgroundColor = i < index ? "green" : (i === index ? "yellow" : "");
                    });
                }

                // Update the display with colored text
                function updateDisplay() {
                    let lessonText = lessons[lessonIndex].lesson.repeat(5);
                    let coloredText = lessonText.split('').map((char, i) => {
                        if (i < typedText.length) {
                            return `<span style="color: ${lessonText[i] === typedText[i] ? 'green' : 'red'};">${char}</span>`;
                        }
                        return i === typedText.length ? `<span style="color: yellow;">${char}</span>` :
                            `<span>${char}</span>`;
                    }).join("");

                    lesson_display.innerHTML = coloredText;

                    checkMistakes();

                    if (typedText.length === lessonText.length) {
                        let lessonId = lessons[lessonIndex].id;
                        let userId = @json(auth()->user()->id);
                        endTimer();
                        updateWPM();

                        $(document).ready(function() {
                            var token = $('meta[name="csrf-token"]').attr('content');

                            // Store achievement data
                            $.ajax({
                                url: "{{ route('storeAchievement') }}",
                                type: "POST",
                                data: {
                                    user_id: userId,
                                    lesson_id: lessonId,
                                    wpm: JSON.stringify(wpm_display.textContent),
                                    duration: String(formattedTime),
                                    accuracy: String(accuracy),
                                    typos: String(mistakes),
                                    total_words: String(lessonText.length)
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


                            // Store achievement data
                            $.ajax({
                                url: "{{ route('storeLevelTrack') }}",
                                type: "POST",
                                data: {
                                    user_id: userId,
                                    lesson_id: lessonId,
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

                            // Store experience points
                            $.ajax({
                                url: "{{ route('storeExps') }}",
                                type: "POST",
                                data: {
                                    user_id: userId,
                                    total_exp: total_exp
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
                        });

                        setTimeout(() => {
                            alert("Successfully finished!");
                            time_display.textContent = "00:00";
                            wpm_display.textContent = "0";
                            mistakes_display.textContent = "0";

                            goToNextLesson();
                        }, 200);
                    }
                }

                // Move to the next lesson
                function goToNextLesson() {
                    lessonIndex++;
                    console.log("Moving to Lesson Index:", lessonIndex); // Debug log
                    if (lessonIndex < lessons.length) {
                        setLesson(lessonIndex);
                    } else {
                        alert("All lessons completed!");
                    }
                }

                // Handle keydown events for typing
                lesson_display.addEventListener("keydown", (event) => {
                    if (event.key.length === 1) {
                        event.preventDefault();
                        if (typedText.length < lessons[lessonIndex].lesson.repeat(5).length) {
                            if (typedText.length === 0) startTimer();
                            typedText += event.key;
                            updateDisplay();
                        }
                    } else if (event.key === "Backspace") {
                        event.preventDefault();
                        typedText = typedText.slice(0, -1);
                        updateDisplay();
                    }
                });

                // Focus the lesson display when the page is clicked
                document.addEventListener("click", () => lesson_display.focus());

                // Initialize the first lesson
                setLesson(lessonIndex);
            });
        </script>
    @endsection
