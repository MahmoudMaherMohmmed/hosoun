@extends('front.layouts.master')
@section('title')
  {{ __('hosoun.otherSubjsPath') }}
@endsection

@section('content')
  @include('front.layouts.page_header', [
      'title' => __('hosoun.otherSubjsPath'),
  ])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-lg-8 col-xl-6 mx-auto">
          @include('admin.message')
          <section class="main-block">
            <form method="post" action="{{url('subjects/save')}}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="name" class="form-label">{{ __('frontstaticword.Name') }}</label>
                <div class="form-group-icon {{ $errors->has('name') ? ' is-invalid' : '' }}">
                  <input type="text" name="name" id="name" class="form-control"
                    placeholder="{{ __('frontstaticword.Name') }}" value="" required>
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
                    placeholder="{{ __('frontstaticword.DateofBirth') }}" value="" required>
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
                  placeholder="{{ __('frontstaticword.Mobile') }}" required>
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
                    <option value="{{ $country->id }}">
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
                      id="male-instructor">
                    <label class="form-check-label fs-14" for="male-instructor">
                      {{ __('hosoun.maleInstructor') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="instructor_gender" value="0"
                      id="female-instructor">
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

              <div class="form-group">
                <label for="class_id" class="form-label">{{ __('hosoun.class') }}</label>
                <div class="form-group-icon {{ $errors->has('class_id') ? ' is-invalid' : '' }}">
                  <select name="class_id" id="class_id" class="select2-search-enable"
                    data-placeholder="{{ __('hosoun.class') }}" required>
                    <option></option>
                    <option value="1">{{ __('hosoun.subjectClasses.kg1') }}</option>
                    <option value="2">{{ __('hosoun.subjectClasses.kg2') }}</option>
                    <option value="3">{{ __('hosoun.subjectClasses.firstPrimary') }}</option>
                    <option value="4">{{ __('hosoun.subjectClasses.secondPrimary') }}</option>
                    <option value="5">{{ __('hosoun.subjectClasses.thirdPrimary') }}</option>
                    <option value="6">{{ __('hosoun.subjectClasses.fourthPrimary') }}</option>
                    <option value="7">{{ __('hosoun.subjectClasses.fifthPrimary') }}</option>
                    <option value="8">{{ __('hosoun.subjectClasses.sixthPrimary') }}</option>
                    <option value="9">{{ __('hosoun.subjectClasses.firstMiddleSchool') }}</option>
                    <option value="10">{{ __('hosoun.subjectClasses.secondMiddleSchool') }}</option>
                    <option value="11">{{ __('hosoun.subjectClasses.thirdMiddleSchool') }}</option>
                    <option value="12">{{ __('hosoun.subjectClasses.firstSecondary') }}</option>
                    <option value="13">{{ __('hosoun.subjectClasses.secondSecondary') }}</option>
                    <option value="14">{{ __('hosoun.subjectClasses.thirdSecondary') }}</option>
                    <option value="15">{{ __('hosoun.subjectClasses.university') }}</option>
                  </select>
                  <i class="isax isax-book"></i>
                </div>
                @if ($errors->has('class_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('class_id') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="subject_id" class="form-label">{{ __('hosoun.chooseSubj') }}</label>
                <div class="form-group-icon {{ $errors->has('subject_id') ? ' is-invalid' : '' }}">
                  <select name="subject_id" id="subject_id" class="select2-search-enable"
                    data-placeholder="{{ __('hosoun.chooseSubj') }}" required>
                    <option></option>
                    <option value="1">{{ __('hosoun.subjects.establishing') }}</option>
                    <option value="2">{{ __('hosoun.subjects.arabicLanguage') }}</option>
                    <option value="3">{{ __('hosoun.subjects.islamicStudies') }}</option>
                    <option value="4">{{ __('hosoun.subjects.english') }}</option>
                    <option value="5">{{ __('hosoun.subjects.mathematics') }}</option>
                    <option value="6">{{ __('hosoun.subjects.sciences') }}</option>
                    <option value="7">{{ __('hosoun.subjects.physics') }}</option>
                    <option value="8">{{ __('hosoun.subjects.alive') }}</option>
                    <option value="9">{{ __('hosoun.subjects.chemistry') }}</option>
                    <option value="10">{{ __('hosoun.subjects.science') }}</option>
                    <option value="11">{{ __('hosoun.subjects.math') }}</option>
                    <option value="12">{{ __('hosoun.subjects.french') }}</option>
                    <option value="13">{{ __('hosoun.subjects.abilitiesAndAchievement') }}</option>
                    <option value="14">{{ __('hosoun.subjects.generalReviews') }}</option>
                  </select>
                  <i class="isax isax-book"></i>
                </div>
                @if ($errors->has('subject_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('subject_id') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="start_date" class="form-label">{{ __('hosoun.whenToStart') }}</label>
                <div class="form-group-icon {{ $errors->has('start_date') ? ' is-invalid' : '' }}">
                  <input type="datetime-local" name="start_date" id="start_date" class="form-control"
                    placeholder="{{ __('hosoun.whenToStart') }}" value="" required>
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
