@extends('front.layouts.master')
@section('title')
  {{ __('hosoun.registerToQuranPath') }}
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
      'title' => __('hosoun.registerToQuranPath'),
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
                  {{ __('hosoun.choosePath') }}
                </div>
                <ul class="nav nav-tabs pb-5 border-0 gap-3" id="learningPathsTabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100 active" id="memorize-tab" data-bs-toggle="tab"
                      data-bs-target="#memorize-tab-pane" type="button" role="tab" aria-controls="memorize-tab-pane"
                      aria-selected="true">
                      {{ __('hosoun.memorize') }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100" id="telawa-tab" data-bs-toggle="tab"
                      data-bs-target="#telawa-tab-pane" type="button" role="tab" aria-controls="telawa-tab-pane"
                      aria-selected="false">
                      {{ __('hosoun.telawa') }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100" id="ejazat-tab" data-bs-toggle="tab"
                      data-bs-target="#ejazat-tab-pane" type="button" role="tab" aria-controls="ejazat-tab-pane"
                      aria-selected="false">
                      {{ __('hosoun.ejazat') }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100" id="keraat-tab" data-bs-toggle="tab"
                      data-bs-target="#keraat-tab-pane" type="button" role="tab" aria-controls="keraat-tab-pane"
                      aria-selected="false">
                      {{ __('hosoun.keraat') }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100" id="tajwed-tab" data-bs-toggle="tab"
                      data-bs-target="#tajwed-tab-pane" type="button" role="tab" aria-controls="tajwed-tab-pane"
                      aria-selected="false">
                      {{ __('hosoun.tajwed') }}
                    </button>
                  </li>

                </ul>
                <section class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="memorize-tab-pane" role="tabpanel"
                    aria-labelledby="memorize-tab" tabindex="0">
                    <div class="form-group">
                      <label for="oldMemorized" class="form-label">
                        {{ __('hosoun.oldMemorized') }}
                      </label>
                      <div class="form-group-icon">
                        <input type="text" name="oldMemorized" id="oldMemorized" class="form-control"
                          placeholder="{{ __('hosoun.oldMemorized') }}" value="" required>
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
                  </div>
                  <div class="tab-pane fade" id="telawa-tab-pane" role="tabpanel" aria-labelledby="telawa-tab"
                    tabindex="0">
                    <div class="form-group">
                      <label for="telawaAmount" class="form-label">
                        {{ __('hosoun.telawaAmount') }}
                      </label>
                      <div class="form-group-icon">
                        <input type="text" name="telawaAmount" id="telawaAmount" class="form-control"
                          placeholder="{{ __('hosoun.telawaAmount') }}" value="" required>
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
                  </div>
                  <div class="tab-pane fade" id="ejazat-tab-pane" role="tabpanel" aria-labelledby="ejazat-tab"
                    tabindex="0">
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
                  </div>
                  <div class="tab-pane fade" id="keraat-tab-pane" role="tabpanel" aria-labelledby="keraat-tab"
                    tabindex="0">
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
                  </div>
                  <div class="tab-pane fade" id="tajwed-tab-pane" role="tabpanel" aria-labelledby="tajwed-tab"
                    tabindex="0">
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
                  </div>
                </section>
              </section>




              <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.Submit') }}</button>
            </form>
          </section>
        </div>
      </div>
    </div>
  </section>
@endsection
