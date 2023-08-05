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

              <div class="form-group">
                <label for="class" class="form-label">
                  {{ __('hosoun.class') }}
                </label>
                <div class="form-group-icon">
                  <select name="class" id="class" class="select2-search-enable"
                    data-placeholder="{{ __('hosoun.class') }}">
                    <option></option>
                    <option value="1">Kg1</option>
                    <option value="2">Kg2</option>
                    <option value="3">أول ابتدائي</option>
                    <option value="4">ثاني ابتدائي</option>
                    <option value="5">ثالث ابتدائي</option>
                    <option value="6">رابع ابتدائي</option>
                    <option value="7">خامس ابتدائي</option>
                    <option value="8">سادس ابتدائي</option>
                    <option value="9">أول متوسط</option>
                    <option value="10">ثاني متوسط</option>
                    <option value="11">ثالث متوسط</option>
                    <option value="12">أول ثانوي</option>
                    <option value="13">ثاني ثانوي</option>
                    <option value="14">ثالث ثانوي</option>
                    <option value="14">جامعة</option>
                  </select>
                  <i class="isax isax-book"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="chooseSubj" class="form-label">
                  {{ __('hosoun.chooseSubj') }}
                </label>
                <div class="form-group-icon">
                  <select name="chooseSubj" id="chooseSubj" class="select2-search-enable"
                    data-placeholder="{{ __('hosoun.chooseSubj') }}">
                    <option></option>
                    <option value="1">تأسيس</option>
                    <option value="2">لغة عربية</option>
                    <option value="3">دراسات إسلامية</option>
                    <option value="4">إنجليزي</option>
                    <option value="5">رياضيات</option>
                    <option value="6">علوم</option>
                    <option value="7">فيزياء</option>
                    <option value="8">أحياء</option>
                    <option value="9">كمياء</option>
                    <option value="10">ساينس</option>
                    <option value="11">ماث</option>
                    <option value="12">فرنساوي</option>
                    <option value="13">قدرات وتحصيلي</option>
                    <option value="14">مراجعات عامة</option>
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
