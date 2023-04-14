@if(Auth::User()->role == 'instructor' || Auth::User()->role == 'user')
    @php 
        $order = App\Order::where('course_id', $course->id)->where('user_id', '=', Auth::user()->id)->first();
        $days = $topic->due_days;
        $orderDate = $order['created_at'];
        $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
    @endphp
@else
    @php $startDate = '0'; @endphp
@endif

@php $mytime = Carbon\Carbon::now(); @endphp
@if($mytime >= $startDate)
<div class="row">
    <div class="col-sm-6 col-lg-4">
    <div class="block-box p-5 mb-4">
        <div class="border-bottom mb-5 pb-5">
        <h3 class="box-title pb-2">{{$topic->title}}</h3>
        <p class="text-dim fs-14 mt-4 mb-0">{{str_limit($topic->description, 120)}}</p>
        </div>

        <ul>
        <li class="d-flex align-items-center fw-bold fs-14 mb-4">
            <svg class="svg-resize-20 svg-fill-accent-2 me-3">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#tick-circle') }}" />
            </svg>
            {{ __('frontstaticword.PerQuestionMark') }}
            <span class="text-accent-2 ms-auto">{{$topic->per_q_mark}}</span>
        </li>
        <li class="d-flex align-items-center fw-bold fs-14 mb-4">
            <svg class="svg-resize-20 svg-fill-accent-2 me-3">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#tick-circle') }}" />
            </svg>
            {{ __('frontstaticword.TotalMarks') }}
            <span class="text-accent-2 ms-auto">
            @php
                $qu_count = 0;
                $quizz = App\Quiz::get();
            @endphp
            @foreach($quizz as $quiz)
            @if($quiz->topic_id == $topic->id)
                @php $qu_count++; @endphp
            @endif
            @endforeach
            {{$topic->per_q_mark*$qu_count}}
            </span>
        </li>
        <li class="d-flex align-items-center fw-bold fs-14 mb-4">
            <svg class="svg-resize-20 svg-fill-accent-2 me-3">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#tick-circle') }}" />
            </svg>
            {{ __('frontstaticword.TotalQuestions') }}
            <span class="text-accent-2 ms-auto">{{$qu_count}}</span>
        </li>
        <li class="d-flex align-items-center fw-bold fs-14">
            <svg class="svg-resize-20 svg-fill-accent-2 me-3">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#tick-circle') }}" />
            </svg>
            {{ __('frontstaticword.QuizPrice') }}
            <span class="text-accent-2 ms-auto">{{ __('frontstaticword.Free') }}</span>
        </li>
        </ul>
        @php
        $users =  App\QuizAnswer::where('topic_id',$topic->id)->where('user_id',Auth::user()->id)->first();
        $quiz_question =  App\Quiz::where('course_id',$course->id)->get();
        @endphp
        @if(empty($users))
        @if($quiz_question != null || $quiz_question!= '')
            <a href="{{route('start_quiz', ['id' => $topic->id])}}" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.StartQuiz') }}</a>
        @endif
        @else
            <a href="{{route('start.quiz.show',$topic->id)}}" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.ShowQuizReport') }}</a>
        
        @if($topic->quiz_again == '1')
            <a href="{{route('tryagain',$topic->id)}}" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.TryAgain') }}</a>
        @endif
        @endif
    </div>
    </div>
</div>
@endif