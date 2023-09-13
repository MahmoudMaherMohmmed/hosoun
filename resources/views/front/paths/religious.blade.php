@extends('front.layouts.master')
@section('title')
  {{ __('hosoun.religiousSubjsPath') }}
@endsection

@section('content')
  @include('front.layouts.page_header', [
      'title' => __('hosoun.religiousSubjsPath'),
  ])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-lg-8 col-xl-6 mx-auto">
          @include('admin.message')

          <section class="main-block">
            <form method="post" action="{{route('religious.save')}}" enctype="multipart/form-data">
              @csrf
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

              
              <section class="form-group d-flex flex-column gap-4">
                <div class="fs-14 fw-bold">
                  {{ __('hosoun.chooseSubj') }}
                </div>
                <div class="d-flex align-items-center gap-5 flex-wrap">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subject_id" value="1" id="aqeda">
                    <label class="form-check-label fs-14" for="aqeda">
                      {{ __('hosoun.aqeda') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subject_id" value="2" id="fekh">
                    <label class="form-check-label fs-14" for="fekh">
                      {{ __('hosoun.fekh') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subject_id" value="3" id="tafsir">
                    <label class="form-check-label fs-14" for="tafsir">
                      {{ __('hosoun.tafsir') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subject_id" value="4" id="seerah">
                    <label class="form-check-label fs-14" for="seerah">
                      {{ __('hosoun.seerah') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subject_id" value="5" id="hadeeth">
                    <label class="form-check-label fs-14" for="hadeeth">
                      {{ __('hosoun.hadeeth') }}
                    </label>
                  </div>
                </div>
                @if ($errors->has('subject_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('instructor_gender') }}</strong>
                  </span>
                @endif
              </section>

              <section class="form-group d-flex flex-column gap-4">
                <div class="fs-14 fw-bold">
                  {{ __('hosoun.choosePreferred') }}
                </div>
                <div class="d-flex align-items-center gap-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="preferred" value="1" id="preferredyes">
                    <label class="form-check-label fs-14" for="preferredyes">
                      {{ __('frontstaticword.Yes') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="preferred" value="0" id="preferredno">
                    <label class="form-check-label fs-14" for="preferredno">
                      {{ __('frontstaticword.No') }}
                    </label>
                  </div>
                </div>
              </section>

              <div class="form-group">
                <label for="preferred_book" class="form-label">
                  {{ __('hosoun.preferredBook') }}
                </label>
                <div class="form-group-icon">
                  <input type="text" name="preferred_book" id="preferred_book" class="form-control"
                    placeholder="{{ __('hosoun.preferredBook') }}" value="" required>
                  <i class="isax isax-book"></i>
                </div>
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
