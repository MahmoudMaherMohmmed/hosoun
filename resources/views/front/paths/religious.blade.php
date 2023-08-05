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
          <section class="main-block">
            <form method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name" class="form-label">
                  {{ __('frontstaticword.Name') }}
                </label>
                <div class="form-group-icon">
                  <input type="text" name="name" id="name" class="form-control"
                    placeholder="{{ __('frontstaticword.Name') }}" value="" required>
                  <i class="isax isax-user"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="birthdate" class="form-label">
                  {{ __('frontstaticword.DateofBirth') }}
                </label>
                <div class="form-group-icon">
                  <input type="datetime-local" name="birthdate" id="birthdate" class="form-control"
                    placeholder="{{ __('frontstaticword.DateofBirth') }}" value="" required>
                  <i class="isax isax-calendar-2"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="mobile" class="form-label">
                  {{ __('frontstaticword.Mobile') }}
                </label>
                <input type="tel" name="mobile" id="mobile" class="form-control"
                  placeholder="{{ __('frontstaticword.Mobile') }}">
              </div>
              
              <div class="form-group">
                <label for="country" class="form-label">
                  {{ __('frontstaticword.country_id') }}
                </label>
                <div class="form-group-icon">
                  <select name="country" id="country" class="select2-search-enable"
                    data-placeholder="{{ __('frontstaticword.country_id') }}">
                    <option></option>
                    @foreach(App\Country::all() as $country)
                    <option value="{{ $country->country_id }}">
                        {{ $country->nicename }}
                    </option>
                    @endforeach
                  </select>
                  <i class="isax isax-location"></i>
                </div>
              </div>

              <section class="form-group d-flex flex-column gap-4">
                <div class="fs-14 fw-bold">
                  {{ __('hosoun.pathInstrctrGender') }}
                </div>
                <div class="d-flex align-items-center gap-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="instuctorGender" value=""
                      id="male-instructor">
                    <label class="form-check-label fs-14" for="male-instructor">
                      {{ __('hosoun.maleInstructor') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="instuctorGender" value=""
                      id="female-instructor">
                    <label class="form-check-label fs-14" for="female-instructor">
                      {{ __('hosoun.femaleInstructor') }}
                    </label>
                  </div>
                </div>
              </section>

              <section class="form-group d-flex flex-column gap-4">
                <div class="fs-14 fw-bold">
                  {{ __('hosoun.chooseSubj') }}
                </div>
                <div class="d-flex align-items-center gap-5 flex-wrap">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subj" value="" id="aqeda">
                    <label class="form-check-label fs-14" for="aqeda">
                      {{ __('hosoun.aqeda') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subj" value="" id="fekh">
                    <label class="form-check-label fs-14" for="fekh">
                      {{ __('hosoun.fekh') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subj" value="" id="tafsir">
                    <label class="form-check-label fs-14" for="tafsir">
                      {{ __('hosoun.tafsir') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subj" value="" id="seerah">
                    <label class="form-check-label fs-14" for="seerah">
                      {{ __('hosoun.seerah') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="subj" value="" id="hadeeth">
                    <label class="form-check-label fs-14" for="hadeeth">
                      {{ __('hosoun.hadeeth') }}
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
                    <input class="form-check-input" type="radio" name="preferred" value="" id="preferredyes">
                    <label class="form-check-label fs-14" for="preferredyes">
                      {{ __('frontstaticword.Yes') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="preferred" value="" id="preferredno">
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
                <div class="form-group-icon">
                  <input type="text" name="preferredBook" id="preferredBook" class="form-control"
                    placeholder="{{ __('hosoun.preferredBook') }}" value="" required>
                  <i class="isax isax-book"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="whenToStart" class="form-label">
                  {{ __('hosoun.whenToStart') }}
                </label>
                <div class="form-group-icon">
                  <input type="datetime-local" name="whenToStart" id="whenToStart" class="form-control"
                    placeholder="{{ __('hosoun.whenToStart') }}" value="" required>
                  <i class="isax isax-calendar-1"></i>
                </div>
              </div>


              <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.Submit') }}</button>
            </form>
          </section>
        </div>
      </div>
    </div>
  </section>
@endsection
