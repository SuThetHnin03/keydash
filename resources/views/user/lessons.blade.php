@extends('user.layout.master')
@section('content')
<div class="levels">

    <div class="hightscore">
        <h3 class="title1">Highest Score:</h3>
        <div class="level level-box1">
            157wpm with 92.5% accuracy
        </div>
    </div>

    <div class="skills">
        <h1>Skill Level</h1>
        <div class="boxes">
            <div class="level level-box2">
                <!-- start -->
                <div class="title">Basics</div>
                <div class="stages">
                    <a href="{{route('userLesson', ['id'=> '1'])}}">
                        <div class="stage stage1" id="1">
                            <span>1</span>
                            <div class="indicators">
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                            </div>
                        </div>
                    </a>
                    <div class="stage stage2" id="B_2">
                        <span>2</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage3" id="1_3">
                        <span>3</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage4" id="1_4">
                        <span>4</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage5" id="1_5">
                        <span>5</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="level level-box3">
                <!-- start -->
                <div class="title">Intermediate</div>
                <div class="stages">
                    <div class="stage stage1">
                        <span>1</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage2">
                        <span>2</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage3">
                        <span>3</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage4">
                        <span>4</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage5">
                        <span>5</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="level level-box4">
                <!-- start -->
                <div class="title">Advanced</div>
                <div class="stages">
                    <div class="stage stage1">
                        <span>1</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage2">
                        <span>2</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage3">
                        <span>3</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage4">
                        <span>4</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage5">
                        <span>5</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>

    <div class="others">
        <h1 class="level-title3">Others</h1>
        <div class="boxes">
            <div class="level level-box5">
                <!-- start -->
                <div class="title">Content Focus</div>
                <div class="stages">
                    <div class="stage stage1">
                        <span>1</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage2">
                        <span>2</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage3">
                        <span>3</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage4">
                        <span>4</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage5">
                        <span>5</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="level level-box6">
                <!-- start -->
                <div class="title">Typing Techniques</div>
                <div class="stages">
                    <div class="stage stage1">
                        <span>1</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage2">
                        <span>2</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage3">
                        <span>3</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage4">
                        <span>4</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage5">
                        <span>5</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="level level-box7">
                <!-- start -->
                <div class="title">Basics</div>
                <div class="stages">
                    <div class="stage stage1">
                        <span>1</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage2">
                        <span>2</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage3">
                        <span>3</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage4">
                        <span>4</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                    <div class="stage stage5">
                        <span>5</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</div>


@endsection
