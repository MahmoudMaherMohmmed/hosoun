@extends('front.layouts.master')

@section('title', __('frontstaticword.answerreoprt'))

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.answerreoprt')])

  <section class="main-wrapper finish-main-block">
    <div class="container">
      <br />
      @if ($auth)
        <div class="row justify-content-center py-5">
          <div class="col-lg-8">
            <div class="main-block">
              <div class="question-block">
                @if ($topics->show_ans == 1)
                  <div class="question-block">
                    <h3 class="text-center main-block-heading">{{ __('frontstaticword.answerreoprt') }}</h3>
                    <section class="my-5">
                      <table class="table table-bordered result-table">
                        <thead>
                          <tr>
                            <th class="p-4">{{ __('frontstaticword.Question') }}</th>
                            <th class="p-4 text-danger">{{ __('frontstaticword.YourAnswer') }}</th>
                            <th class="p-4 text-accent">{{ __('frontstaticword.CorrectAnswer') }}</th>
                          </tr>
                        </thead>
                        <tbody>

                          @php
                            $x = $count_questions;
                            $y = 1;
                          @endphp
                          @foreach ($ans as $key => $a)
                            <tr>
                              <td class="p-4">{{ $a->quiz->question }}</td>
                              <td class="p-4">{{ $a->user_answer }}</td>
                              <td class="p-4">{{ $a->answer }}</td>
                            </tr>
                            @php
                              $y++;
                              if ($y > $x) {
                                  break;
                              }
                            @endphp
                          @endforeach
                        </tbody>
                      </table>
                    </section>
                  </div>
                @endif

                <div id="printableArea">
                  <h3 class="text-center main-block-heading">{{ __('frontstaticword.scorecard') }} </h3>
                  <section class="table-responsive my-5">
                    <table class="table table-bordered result-table">
                      <thead>
                        <tr>
                          <th class="p-4">{{ __('frontstaticword.TotalQuestion') }}</th>
                          <th class="p-4">{{ __('frontstaticword.CorrectQuestions') }}</th>
                          <th class="p-4">{{ __('frontstaticword.PerQuestionMark') }}</th>
                          <th class="p-4">{{ __('frontstaticword.TotalMarks') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="p-4">{{ $count_questions }}</td>
                          <td class="p-4">
                            @php
                              $mark = 0;
                              $ca = 0;
                              $correct = collect();
                            @endphp
                            @foreach ($ans as $answer)
                              @if ($answer->answer == $answer->user_answer)
                                @php
                                  $mark++;
                                  $ca++;
                                @endphp
                              @endif
                            @endforeach
                            {{ $ca }}
                          </td>
                          <td class="p-4">{{ $topics->per_q_mark }}</td>
                          @php
                            $correct = $mark * $topics->per_q_mark;
                          @endphp
                          <td class="p-4">{{ $correct }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </section>
                  <h2 class="text-center">{{ __('frontstaticword.ThankYou') }}</h2>
                </div>
                <div
                  class="finish-btn text-center d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3 mt-5">
                  <input type="button" class="btn w-100 btn-accent text-white" onclick="printDiv('printableArea')"
                    value="Print" />

                  @if ($topics->quiz_again == '1')
                    <a href="{{ route('tryagain', $topics->id) }}"
                      class="btn w-100 btn-accent2">{{ __('frontstaticword.TryAgain') }} </a>
                  @endif
                  <a href="{{ route('course.content', ['id' => $topics->course_id, 'slug' => $topics->courses->slug]) }}"
                    class="btn w-100 btn-accent2-light">{{ __('frontstaticword.Back') }} </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
  <br />
@endsection

@section('custom-js')
  <script>
    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
    }
  </script>
@endsection
