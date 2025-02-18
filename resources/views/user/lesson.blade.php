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
                <ul id="lesson-keys">

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
                <span id="lesson_display" contenteditable="true">qwerrr qwerrr qwerrr qwer qwer qwer qw qw qw rr rr rr QWER
                    QWER QWER qwerrr qwerty
                    qwerrr qwe rty
                    qwe rty q q q w w w e e e r rr qwerrr qwerrr qwerrr</span>
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
                const lessons = @json($lesson); // Laravel blade syntax for passing data
                let lessonIndex = 0;
                let typedText = "";

                console.log("Lessons:", lessons); // Debugging output

                lesson_display.setAttribute("contenteditable", "true");
                lesson_display.setAttribute("tabindex", "0");
                lesson_display.focus();

                function setLesson(index) {
                    if (index >= lessons.length) {
                        alert("All lessons completed!");

                        progressBar.style.backgroundColor = "green";
                        return;
                    }

                    let currentLesson = lessons[index];
                    lesson_display.innerHTML = currentLesson.lesson.repeat(5);
                    typedText = "";
                    highlightLesson(index);
                }

                function highlightLesson(index) {
                    let elements = [one, two, three, four, five];
                    elements.forEach((el, i) => {
                        el.style.backgroundColor = i < index ? "green" : (i === index ? "yellow" : "");
                    });
                }

                function updateDisplay() {
                    let lessonKey = document.querySelector("#lesson-keys");
                    let lessonText = lessons[lessonIndex].lesson.repeat(5);
                    let coloredText = lessonText.split('').map((char, i) => {
                        if (i < typedText.length) {
                            return `<span style="color: ${lessonText[i] === typedText[i] ? 'green' : 'red'};">${char}</span>`;
                        }
                        return i === typedText.length ? `<span style="color: yellow;">${char}</span>` :
                            `<span>${char}</span>`;
                    }).join("");

                    console.log();

                    lesson_display.innerHTML = coloredText;

                    if (typedText.length === lessonText.length) {
                        setTimeout(() => {
                            alert("Successfully finished!");
                            goToNextLesson();

                            let lessonId = (lessons[lessonIndex].id -1); // Get lesson ID
                            let userId = @json(auth()->user()->id); // Get user ID

                            console.log("lesson_id" + (lessonId));
                            console.log("user_id" + userId);



                            $(document).ready(function() {
                                // Get CSRF token from the meta tag
                                var token = $('meta[name="csrf-token"]').attr('content');

                                $.ajax({
                                    url: "{{ route('storeData') }}",
                                    type: "POST",
                                    data: {
                                        lesson_id: lessonId,
                                        user_id: userId
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': token // Add CSRF token to the request headers
                                    },
                                    success: function(response) {
                                        console.log(response);
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });

                            });

                        }, 200);
                    }
                }



                function goToNextLesson() {
                    lessonIndex++;
                    if (lessonIndex < lessons.length) {
                        setLesson(lessonIndex);
                    } else {
                        alert("All lessons completed!");
                    }
                }

                lesson_display.addEventListener("keydown", (event) => {
                    if (event.key.length === 1) {
                        event.preventDefault();
                        if (typedText.length < lessons[lessonIndex].lesson.repeat(5).length) {
                            typedText += event.key;
                            updateDisplay();
                        }
                    } else if (event.key === "Backspace") {
                        event.preventDefault();
                        typedText = typedText.slice(0, -1);
                        updateDisplay();
                    }
                });

                document.addEventListener("click", () => lesson_display.focus());
                setLesson(lessonIndex);
            });
        </script>
    @endsection
