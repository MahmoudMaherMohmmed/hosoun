@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('hosoun.registerToEjazatPath') }}
@endsection

@section('content')
  @include('front.layouts.page_header', [
      'title' => __('hosoun.registerToEjazatPath'),
  ])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-lg-8 col-xl-6 mx-auto">
          <section class="main-block">
            <form method="post" action="" class="p-sm-4" enctype="multipart/form-data">
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
                <label for="country" class="form-label">
                  {{ __('frontstaticword.country_id') }}
                </label>
                <div class="form-group-icon">
                  <select name="country" id="country" class="select2-search-enable"
                    data-placeholder="{{ __('frontstaticword.country_id') }}">
                    <option></option>
                    <option value="0">option1</option>
                    <option value="1">option2</option>
                    <option value="2">option3</option>
                  </select>
                  <i class="isax isax-location"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="nationality" class="form-label">{{ __('frontstaticword.Nationality') }}</label>
                <div class="form-group-icon">
                  <select name="nationality" id="nationality" class="select2-search-enable"
                    data-placeholder="{{ __('frontstaticword.Nationality') }}">
                    <option></option>
                    <option value="0"> {{ __('frontstaticword.SaudiArabia') }} </option>
                    <option value="1"> {{ __('frontstaticword.GulfCountries') }} </option>
                    <option value="2"> {{ __('frontstaticword.ArabCountries') }} </option>
                    <option value="3"> {{ __('frontstaticword.ForeignerWithASaudiPassport') }} </option>
                    <option value="4"> {{ __('frontstaticword.DisplacedTribesmen') }} </option>
                    <option value="5"> {{ __('frontstaticword.OtherNationality') }} </option>
                  </select>
                  <i class="isax isax-card"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="mobile" class="form-label">
                  {{ __('frontstaticword.Mobile') }}
                </label>
                <input type="tel" name="mobile" id="mobile" class="form-control"
                  placeholder="{{ __('frontstaticword.Mobile') }}">
              </div>

              <section class="form-group d-flex flex-column gap-4">
                <div class="fs-14 fw-bold">
                  {{ __('hosoun.ejazaFrom') }}
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

              {{-- <div class="form-group">
                <label for="oldEjazat" class="form-label">
                  {{ __('hosoun.oldEjazat') }}
                </label>
                <div class="form-group-icon">
                  <input type="text" name="oldEjazat" id="oldEjazat" class="form-control"
                    placeholder="{{ __('hosoun.oldEjazat') }}" value="" required>
                  <i class="isax isax-book"></i>
                </div>
              </div> --}}

              <div class="form-group">
                <label for="oldEjazat" class="form-label">
                  {{ __('hosoun.oldEjazat') }}
                </label>
                <div class="form-group-icon">
                  <select name="oldEjazat" id="oldEjazat" class="select2-search-enable"
                    data-placeholder="{{ __('hosoun.oldEjazat') }}">
                    <option></option>
                    <option value="1">في القرآن الكريم</option>
                    <option value="2">في التجويد</option>
                    <option value="3">في القراءات</option>
                    <option value="4">في اللغة العربية</option>
                    <option value="5">في العقيدة</option>
                    <option value="6">في الحديث</option>
                  </select>
                  <i class="isax isax-book"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="required" class="form-label">
                  {{ __('hosoun.requiredEjazat') }}
                </label>
                <div class="form-group-icon">
                  <select name="required" id="required" class="select2-search-enable"
                    data-placeholder="{{ __('hosoun.requiredEjazat') }}">
                    <option></option>
                    <option value="1">في القرآن الكريم</option>
                    <option value="2">في التجويد</option>
                    <option value="3">في القراءات</option>
                    <option value="4">في اللغة العربية</option>
                    <option value="5">في العقيدة</option>
                    <option value="6">في الحديث</option>
                  </select>
                  <i class="isax isax-note-1"></i>
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
