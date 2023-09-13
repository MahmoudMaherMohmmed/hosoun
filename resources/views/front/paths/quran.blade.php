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
          @include('admin.message')

          <section class="main-block">
            <form method="post" action="{{route('quran.save')}}" enctype="multipart/form-data">
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

{{-- ============= --}}
              <section class="form-group d-flex flex-column gap-4">
                <div class="fs-14 fw-bold">
                  {{ __('hosoun.choosePath') }}
                </div>
                <input type="hidden" name="sub_path" value="{{old('sub_path','1')}}">
                <ul class="nav nav-tabs pb-5 border-0 gap-3" id="learningPathsTabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100 {{old('sub_path','1')== '1'? 'active':''}}" id="memorize-tab" data-bs-toggle="tab"
                      data-bs-target="#memorize-tab-pane" type="button" role="tab" aria-controls="memorize-tab-pane"
                      aria-selected="{{old('sub_path','1')== '1'? 'true':'false'}}" data-qpath="1">
                      {{ __('hosoun.memorize') }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100 {{old('sub_path')== '2'? 'active':''}}" id="telawa-tab" data-bs-toggle="tab"
                      data-bs-target="#telawa-tab-pane" type="button" role="tab" aria-controls="telawa-tab-pane"
                      aria-selected="{{old('sub_path')== '2'? 'true':'false'}}" data-qpath="2">
                      {{ __('hosoun.telawa') }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100 {{old('sub_path')== '3'? 'active':''}}" id="ejazat-tab" data-bs-toggle="tab"
                      data-bs-target="#ejazat-tab-pane" type="button" role="tab" aria-controls="ejazat-tab-pane"
                      aria-selected="{{old('sub_path')== '3'? 'true':'false'}}" data-qpath="3">
                      {{ __('hosoun.ejazat') }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100 {{old('sub_path')== '4'? 'active':''}}" id="keraat-tab" data-bs-toggle="tab"
                      data-bs-target="#keraat-tab-pane" type="button" role="tab" aria-controls="keraat-tab-pane"
                      aria-selected="{{old('sub_path')== '4'? 'true':'false'}}" data-qpath="4">
                      {{ __('hosoun.keraat') }}
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link border w-100 {{old('sub_path')== '5'? 'active':''}}" id="tajwed-tab" data-bs-toggle="tab"
                      data-bs-target="#tajwed-tab-pane" type="button" role="tab" aria-controls="tajwed-tab-pane"
                      aria-selected="{{old('sub_path')== '5'? 'true':'false'}}" data-qpath="5">
                      {{ __('hosoun.tajwed') }}
                    </button>
                  </li>

                </ul>
                <section class="tab-content" id="myTabContent">
                  <div class="tab-pane fade {{old('sub_path','1')== '1'? 'show active':''}}" id="memorize-tab-pane" role="tabpanel"
                    aria-labelledby="memorize-tab" tabindex="0">
                    <div class="form-group">
                      <label for="oldMemorized" class="form-label">
                        {{ __('hosoun.oldMemorized') }}
                      </label>
                      <div class="form-group-icon {{ $errors->has('old_memorized') ? ' is-invalid' : '' }}">
                        <input type="text" name="old_memorized" id="oldMemorized" class="form-control"
                          placeholder="{{ __('hosoun.oldMemorized') }}" value="{{old('old_memorized')}}">
                        <i class="isax isax-book"></i>
                      </div>
                      @if ($errors->has('old_memorized'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('old_memorized') }}</strong>
                      </span>
                      @endif
                    </div>


                  </div>
                  <div class="tab-pane fade {{old('sub_path')== '2'? 'show active':''}}" id="telawa-tab-pane" role="tabpanel" aria-labelledby="telawa-tab"
                    tabindex="0">
                    <div class="form-group">
                      <label for="telawaAmount" class="form-label">
                        {{ __('hosoun.telawaAmount') }}
                      </label>
                      <div class="form-group-icon {{ $errors->has('telawa_amount') ? ' is-invalid' : '' }}">
                        <input type="text" name="telawa_amount" id="telawaAmount" class="form-control"
                          placeholder="{{ __('hosoun.telawaAmount') }}" value="{{old('telawa_amount')}}" >
                        <i class="isax isax-book"></i>
                      </div>
                      @if ($errors->has('telawa_amount'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('telawa_amount') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="tab-pane fade {{old('sub_path')== '3'? 'show active':''}}" id="ejazat-tab-pane" role="tabpanel" aria-labelledby="ejazat-tab"
                    tabindex="0">
                    <div class="form-group">
                      <label for="oldEjazat" class="form-label">
                        {{ __('hosoun.oldEjazat') }}
                      </label>
                      <div class="form-group-icon {{ $errors->has('old_ejazat') ? ' is-invalid' : '' }}">
                        <select name="old_ejazat[]" id="oldEjazat" class="select2-search-enable"
                          data-placeholder="{{ __('hosoun.oldEjazat') }}" multiple>
                          <option disabled></option>
                          <option value="1" >في القرآن الكريم</option>
                          <option value="2">في التجويد</option>
                          <option value="3">في القراءات</option>
                          <option value="4">في اللغة العربية</option>
                          <option value="5">في العقيدة</option>
                          <option value="6">في الحديث</option>
                        </select>
                        <i class="isax isax-book"></i>
                      </div>
                      @if ($errors->has('old_ejazat'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('old_ejazat') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="required_ejazat" class="form-label">
                        {{ __('hosoun.requiredEjazat') }}
                      </label>
                      <div class="form-group-icon {{ $errors->has('required_ejazat') ? ' is-invalid' : '' }}">
                        <select name="required_ejazat" id="required_ejazat" class="select2-search-enable"
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
                      @if ($errors->has('required_ejazat'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('required_ejazat') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="tab-pane fade {{old('sub_path')== '4'? 'show active':''}}" id="keraat-tab-pane" role="tabpanel" aria-labelledby="keraat-tab"
                    tabindex="0">
                    <div class="form-group">
                      <label for="requiredQeraa" class="form-label">
                        {{ __('hosoun.requiredQeraa') }}
                      </label>
                      <div class="form-group-icon {{ $errors->has('required_qeraa') ? ' is-invalid' : '' }}">
                        <select name="required_qeraa" id="requiredQeraa" class="select2-search-enable"
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
                      @if ($errors->has('required_qeraa'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('required_qeraa') }}</strong>
                      </span>
                      @endif
                    </div>

                  </div>
                  <div class="tab-pane fade {{old('sub_path')== '5'? 'show active':''}}" id="tajwed-tab-pane" role="tabpanel" aria-labelledby="tajwed-tab"
                    tabindex="0">
                  </div>
                </section>
              </section>
{{-- =========== --}}

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
      $('input[name="sub_path"]').val($(this).data('qpath'));
    });
  });
  </script>  
@endpush