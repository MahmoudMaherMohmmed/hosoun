@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('hosoun.registerToMemorizePath') }}
@endsection

@section('content')
  @include('front.layouts.page_header', [
      'title' => __('hosoun.registerToMemorizePath'),
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
                  <svg class="svg-default form-control-icon">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#profile') }}" />
                  </svg>
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="form-label">
                  {{ __('frontstaticword.DateofBirth') }}
                </label>
                <div class="form-group-icon">
                  <input type="text" name="name" id="name" class="form-control"
                    placeholder="{{ __('frontstaticword.DateofBirth') }}" value="" required>
                  <svg class="svg-default form-control-icon">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#profile') }}" />
                  </svg>
                </div>
              </div>
              <div class="form-group">
                <label for="country" class="form-label">
                  {{ __('frontstaticword.country_id') }}
                </label>
                <div class="form-group-icon">
                  <select name="nationality" id="country" class="select2-search-enable"
                    data-placeholder="{{ __('frontstaticword.country_id') }}">
                    <option></option>
                    <option value="0"> </option>
                    <option value="1"> </option>
                    <option value="2"> </option>
                  </select>
                  <svg class="svg-default form-control-icon">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#location') }}" />
                  </svg>
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
                  <svg class="svg-default form-control-icon">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#location') }}" />
                  </svg>
                </div>
              </div>

              <div class="form-group">
                <label for="mobile" class="form-label">
                  {{ __('frontstaticword.Mobile') }}
                </label>
                <input type="tel" name="mobile" id="mobile" class="form-control "
                  placeholder="{{ __('frontstaticword.Mobile') }}">
              </div>



              <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.Submit') }}</button>
            </form>
          </section>
        </div>
      </div>
    </div>
  </section>
@endsection
