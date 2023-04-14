@extends('front.layouts.master')

@section('title')
  {{$topic->title}}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => $topic->title])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          @if($quizzes->isEmpty())
            <div class="alert alert-danger">
              No Questions in this quiz
            </div>
          @else
            @if(!empty($answers))
              <div class="alert alert-danger">
                You have already Given the test ! Try to give other Quizes
              </div>
            @else
              <form action="{{route('start.quiz.store',$topic->id) }}" method="POST" class="exam">
                @csrf
                <div class="form-step" id="form_step"></div>
                @foreach($quizzes as $key => $question)
                <input type="hidden" id="question_id[{{$key+1}}]" name="question_id[{{$key+1}}]" value="{{ $question['id'] }}">
                <input type="hidden" id="canswer[{{$key+1}}]" name="canswer[{{$key+1}}]" value="{{ $question['answer'] }}">
                <div class="tab d-none">
                  <h4 class="exam-q">{{ $question['question'] }}</h4>
                  <div class="main-block exam-q-content">
                    <div class="form-check w-100 mb-4">
                      <input class="form-check-input" type="radio" name="answer[{{$key+1}}]" value="A" id="q1-option1">
                      <label class="form-check-label fs-14 ms-3" for="q1-option1">
                        {{ $question['a'] }}
                      </label>
                    </div>
                    <div class="form-check w-100 mb-4">
                      <input class="form-check-input" type="radio" name="answer[{{$key+1}}]" value="B" id="q1-option2">
                      <label class="form-check-label fs-14 ms-3" for="q1-option2">
                        {{ $question['b'] }}
                      </label>
                    </div>
                    <div class="form-check w-100 mb-4">
                      <input class="form-check-input" type="radio" name="answer[{{$key+1}}]" value="C" id="q1-option3">
                      <label class="form-check-label fs-14 ms-3" for="q1-option3">
                        {{ $question['c'] }}
                      </label>
                    </div>
                    <div class="form-check w-100 mb-4">
                      <input class="form-check-input" type="radio" name="answer[{{$key+1}}]" value="D" id="q1-option4">
                      <label class="form-check-label fs-14 ms-3" for="q1-option4">
                        {{ $question['d'] }}
                      </label>
                    </div>
                  </div>
                </div>
                @endforeach


                <div class="d-flex align-items-center mt-5 pt-3">
                  @if($quizzes->count() > 1)
                    <button type="button" id="next_button" class="btn btn-accent me-4" onclick="formNext()">{{ __('frontstaticword.Next') }}</button>
                  @else
                    <button type="submit" class="btn btn-accent me-4">{{ __('frontstaticword.Finish') }}</button>
                  @endif
                  <button type="button" id="back_button" class="btn btn-accent-light" onclick="formBack()">{{ __('frontstaticword.Prev') }}</button>
                </div>
              </form>
            @endif
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection
@section('custom-js')
  <script src="{{ asset('front/js/form_step.js') }}"></script>
@endsection
