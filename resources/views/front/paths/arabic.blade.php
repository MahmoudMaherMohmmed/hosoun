@extends('front.layouts.master')
@section('title')
  {{ __('hosoun.arabicLangPath') }}
@endsection

@section('custom-css')
  <style>
    #learningPathsTabs .nav-link {
      padding: 0.75rem 2rem;
    }
  </style>
@endsection

@section('content')
  @include('front.layouts.page_header', [
      'title' => __('hosoun.arabicLangPath'),
  ])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-lg-8 col-xl-6 mx-auto">
          @include('admin.message')

          <section class="main-block">
            <form method="post" action="{{route('arabic.save')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name" class="form-label">{{ __('frontstaticword.Name') }}</label>
                <div class="form-group-icon {{ $errors->has('name') ? ' is-invalid' : '' }}">
                  <input type="text" name="name" id="name" class="form-control"
                    placeholder="{{ __('frontstaticword.Name') }}" value="{{old('name')}}" required>
                  <i class="isax isax-user"></i>
                </div>
                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="birth_date" class="form-label">{{ __('frontstaticword.DateofBirth') }}</label>
                <div class="form-group-icon {{ $errors->has('birth_date') ? ' is-invalid' : '' }}">
                  <input type="datetime-local" name="birth_date" id="birth_date" class="form-control"
                    placeholder="{{ __('frontstaticword.DateofBirth') }}" value="{{old('birth_date')}}" required>
                  <i class="isax isax-calendar-2"></i>
                </div>
                @if ($errors->has('birth_date'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birth_date') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="mobile" class="form-label">{{ __('frontstaticword.Mobile') }}</label>
                <input type="tel" name="mobile" id="mobile" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.Mobile') }}" value="{{old('mobile')}}" required>
                @if ($errors->has('mobile'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mobile') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="country_id" class="form-label">{{ __('frontstaticword.country_id') }}</label>
                <div class="form-group-icon {{ $errors->has('country_id') ? ' is-invalid' : '' }}">
                  <select name="country_id" id="country_id" class="select2-search-enable"
                    data-placeholder="{{ __('frontstaticword.country_id') }}" required>
                    <option></option>
                    @foreach(App\Country::all() as $country)
                    <option value="{{ $country->id }}" {{old('country_id') == $country->id ? 'selected' : ''}}>
                        {{ $country->nicename }}
                    </option>
                    @endforeach
                  </select>
                  <i class="isax isax-location"></i>
                </div>
                @if ($errors->has('country_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('country_id') }}</strong>
                  </span>
                @endif
              </div>

              <section class="form-group d-flex flex-column gap-4">
                <div class="fs-14 fw-bold">{{ __('hosoun.pathInstrctrGender') }}</div>
                <div class="d-flex align-items-center gap-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="instructor_gender" value="1"
                      id="male-instructor" {{old('instructor_gender') == 1 ? 'checked' :''}}>
                    <label class="form-check-label fs-14" for="male-instructor">
                      {{ __('hosoun.maleInstructor') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="instructor_gender" value="0"
                      id="female-instructor"  {{old('instructor_gender') == 0 ? 'checked' :''}}>
                    <label class="form-check-label fs-14" for="female-instructor">
                      {{ __('hosoun.femaleInstructor') }}
                    </label>
                  </div>
                </div>
                @if ($errors->has('instructor_gender'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('instructor_gender') }}</strong>
                  </span>
                @endif
              </section>

              {{-- ================= --}}
              <input type="hidden" name="arabic_native" value="{{old('arabic_native','1')}}">
              <ul class="nav nav-tabs gap-3 pb-5 border-0" id="learningPathsTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link border w-100 {{old('arabic_native','1')== '1'? 'active':''}}" id="arabic-tab" data-bs-toggle="tab"
                    data-bs-target="#arabic-tab-pane" type="button" role="tab" aria-controls="arabic-tab-pane"
                    aria-selected="{{old('arabic_native','1')== '1'? 'true':'false'}}" data-apath="1">{{ __('hosoun.arabicSpeaker') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link border w-100 {{old('arabic_native')== '0'? 'active':''}}" id="nonarabic-tab" data-bs-toggle="tab"
                    data-bs-target="#nonarabic-tab-pane" type="button" role="tab"
                    aria-controls="nonarabic-tab-pane"
                    aria-selected="{{old('arabic_native')== '0'? 'true':'false'}}" data-apath="0">{{ __('hosoun.nonArabicSpeaker') }}</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade {{old('arabic_native','1')== '1'? 'show active':''}}" id="arabic-tab-pane" role="tabpanel"
                  aria-labelledby="arabic-tab" tabindex="0">

                  <section class="form-group d-flex flex-column gap-4">
                    <div class="fs-14 fw-bold">
                      {{ __('hosoun.chooseSubj') }}
                    </div>
                    <div class="d-flex align-items-center gap-5 flex-wrap">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="subject_id" value="1" id="nahou"  {{old('subject_id','1') == 1 ? 'checked' :''}}>
                        <label class="form-check-label fs-14" for="nahou">
                          {{ __('hosoun.nahou') }}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="subject_id" value="2" id="sarf" {{old('subject_id') == 2 ? 'checked' :''}}>
                        <label class="form-check-label fs-14" for="sarf">
                          {{ __('hosoun.sarf') }}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="subject_id" value="3" id="balagha" {{old('subject_id') == 3 ? 'checked' :''}}>
                        <label class="form-check-label fs-14" for="balagha">
                          {{ __('hosoun.balagha') }}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="subject_id" value="4" id="ourod" {{old('subject_id') == 4 ? 'checked' :''}}>
                        <label class="form-check-label fs-14" for="ourod">
                          {{ __('hosoun.ourod') }}
                        </label>
                      </div>
                    </div>
                  </section>

                  <section class="form-group d-flex flex-column gap-4">
                    <div class="fs-14 fw-bold">
                      {{ __('hosoun.choosePreferred') }}
                    </div>
                    <div class="d-flex align-items-center gap-5">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="preferred" value="1"
                          id="preferredyes" {{old('preferred','1') == 1 ? 'checked' :''}}>
                        <label class="form-check-label fs-14" for="preferredyes">
                          {{ __('frontstaticword.Yes') }}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="preferred" value="0"
                          id="preferredno"  {{old('preferred') == 0 ? 'checked' :''}}>
                        <label class="form-check-label fs-14" for="preferredno">
                          {{ __('frontstaticword.No') }}
                        </label>
                      </div>
                    </div>
                  </section>

                  <div class="form-group">
                    <label for="preferredBook" class="form-label">
                      {{ __('hosoun.preferredBook') }}
                    </label>
                    <div class="form-group-icon {{ $errors->has('preferred_book') ? ' is-invalid' : '' }}">
                      <input type="text" name="preferred_book" id="preferredBook" class="form-control"
                        placeholder="{{ __('hosoun.preferredBook') }}" value="{{old('preferred_book')}}">
                      <i class="isax isax-book"></i>
                    </div>
                    @if ($errors->has('preferred_book'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('preferred_book') }}</strong>
                      </span>
                      @endif
                  </div>

                </div>
                <div class="tab-pane fade {{old('arabic_native')== '0'? 'show active':''}}" id="nonarabic-tab-pane" role="tabpanel" aria-labelledby="nonarabic-tab"
                  tabindex="0">

                  <section class="form-group d-flex flex-column gap-4">
                    <div class="fs-14 fw-bold">
                      {{ __('hosoun.speakArabic') }}
                    </div>
                    <div class="d-flex align-items-center gap-5 {{ $errors->has('speak_arabic') ? ' is-invalid' : '' }}">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="speak_arabic" value="1"
                          id="yes" {{old('speak_arabic','1') == 1 ? 'checked' :''}}>
                        <label class="form-check-label fs-14" for="yes">
                          {{ __('frontstaticword.Yes') }}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="speak_arabic" value="0"
                          id="no" {{old('speak_arabic') == 0 ? 'checked' :''}}>
                        <label class="form-check-label fs-14" for="no">
                          {{ __('frontstaticword.No') }}
                        </label>
                      </div>
                    </div>
                    @if ($errors->has('speak_arabic'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('speak_arabic') }}</strong>
                      </span>
                      @endif
                  </section>

                  <div class="form-group">
                    <label for="spokenLang" class="form-label">
                      {{ __('hosoun.spokenLang') }}
                    </label>
                    <div class="form-group-icon {{ $errors->has('spoken_lang') ? ' is-invalid' : '' }}">
                      <input type="text" name="spoken_lang" id="spokenLang" class="form-control"
                        placeholder="{{ __('hosoun.spokenLang') }}" value="{{old('spoken_lang')}}" >
                      <i class="isax isax-book"></i>
                    </div>
                    @if ($errors->has('spoken_lang'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('spoken_lang') }}</strong>
                      </span>
                      @endif
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="start_date" class="form-label">{{ __('hosoun.whenToStart') }}</label>
                <div class="form-group-icon {{ $errors->has('start_date') ? ' is-invalid' : '' }}">
                  <input type="datetime-local" name="start_date" id="start_date" class="form-control"
                    placeholder="{{ __('hosoun.whenToStart') }}" value="{{old('start_date')}}" required>
                  <i class="isax isax-calendar-1"></i>
                </div>
                @if ($errors->has('start_date'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('start_date') }}</strong>
                  </span>
                @endif
              </div>


              <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.Submit') }}</button>
            </form>
          </section>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('js')
<script>
  $(document).ready(function () {
    $('#learningPathsTabs .nav-link').on('click', function () {
      $('input[name="arabic_native"]').val($(this).data('apath'));
    });
  });
  </script>  
@endpush