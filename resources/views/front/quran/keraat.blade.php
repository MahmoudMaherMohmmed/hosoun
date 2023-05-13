@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('hosoun.registerToKeraatPath') }}
@endsection

@section('content')
  @include('front.layouts.page_header', [
      'title' => __('hosoun.registerToKeraatPath'),
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
                  {{ __('hosoun.readBy') }}
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

              <div class="form-group">
                <label for="requiredQeraa" class="form-label">
                  {{ __('hosoun.requiredQeraa') }}
                </label>
                <div class="form-group-icon">
                  <select name="requiredQeraa" id="requiredQeraa" class="select2-search-enable"
                    data-placeholder="{{ __('hosoun.requiredQeraa') }}">
                    <option></option>
                    <option value="1">عاصم الكوفي</option>
                    <option value="2">نافع المدني</option>
                    <option value="3">أبو عمرو البصري</option>
                    <option value="4">ابن عامر الشامي</option>
                    <option value="5">ابن كثير المكي</option>
                    <option value="6">حمزة الكوفي</option>
                    <option value="7">الكسائي الكوفي</option>
                    <option value="8">ابو جعفر المدني</option>
                    <option value="9">يعقوب الحضرمي</option>
                    <option value="10">خلف العاشر</option>
                  </select>
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
