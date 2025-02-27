@section('title')
<title>Lessons Page</title>
@endsection
@extends('user.layout.master')
@section('content')
<div class="levels">

    <div class="hightscore">
        <h3 class="title1">Highest Score:</h3>

           <div class="level level-box1">
            @if ($best == null)
            <h5>No record yet</h5>
            @else
            {{str_replace('"', '', $best['wpm'])}} wpm with {{ round($best->accuracy, 2) }}%
            accuracy
            @endif
        </div>

    </div>

    <div class="skills">
        <h1 style="text-align:start;">Skill Level</h1>
        <div class="boxes">
            <div class="level level-box2">
                <!-- start -->
                <div class="title">Basics</div>
                <div class="stages">
                    <a @if($level_tracks >=0) href="{{route('userLesson', ['id'=> 1, 'lesson_start_id' => 1 ,'lesson_end_id' => 5])}}" @endif >
                        <div class="stage stage1" id="1">
                            <div class="stage-lock" @if($level_tracks >=0) style="display:none" @endif>
                                <i data-feather="lock"></i>
                            </div>
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
                  <a @if($level_tracks >=5) href="{{route('userLesson', ['id'=> 1, 'lesson_start_id' => 6, 'lesson_end_id' => 10])}} @endif ">
                    <div class="stage stage2" id="B_2">
                        <div class="stage-lock" @if($level_tracks >=5) style="display:none" @endif>
                            <i data-feather="lock"></i>
                        </div>
                        <span>2</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                  </a>
                   <a @if($level_tracks >=10) href="{{route('userLesson', ['id'=> 1, 'lesson_start_id' => 11, 'lesson_end_id' => 15])}} @endif ">
                    <div class="stage stage3" id="1_3">
                        <div class="stage-lock" >
                            <i data-feather="lock"></i>
                        </div>
                        <span>3</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                   </a>
                    <a @if($level_tracks >=15) href="{{route('userLesson', ['id'=> 1, 'lesson_start_id' => 16, 'lesson_end_id' => 20])}}" @endif >
                        <div class="stage stage4" id="1_4">
                            <div class="stage-lock" @if($level_tracks >=15) style="display:none" @endif>
                                <i data-feather="lock"></i>
                            </div>
                            <span>4</span>
                            <div class="indicators">
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                                <span class="indicator"></span>
                            </div>
                        </div>
                    </a>
                   <a @if($level_tracks >=20) href="{{route('userLesson', ['id'=> 1, 'lesson_start_id' => 21, 'lesson_end_id' => 25])}}" @endif >
                    <div class="stage stage5" id="1_5">
                        <div class="stage-lock" @if($level_tracks >=20) style="display:none" @endif>
                            <i data-feather="lock"></i>
                        </div>
                        <span>5</span>
                        <div class="indicators">
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                            <span class="indicator"></span>
                        </div>
                    </div>
                   </a>
                </div>
                <!-- end -->
            </div>
            <div class="level level-box3">
                <!-- start -->
                <div class="title">Intermediate</div>
                <div class="stages">
                    <div class="stage stage1">
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
        <h1 class="level-title3" style="text-align: start" >Others</h1>
        <div class="boxes">
            <div class="level level-box5">
                <!-- start -->
                <div class="title">Content Focus</div>
                <div class="stages">
                    <div class="stage stage1">
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
                        <div class="stage-lock">
                            <i data-feather="lock"></i>
                        </div>
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
