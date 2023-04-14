@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.MyBankDetails') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.MyBankDetails')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          @include('admin.message')
          <div class="d-flex mb-5">
            <button type="button" class="btn btn-accent px-5 ms-auto" data-bs-toggle="modal"
              data-bs-target="#AddBankAccount">
              {{ __('frontstaticword.AddBank') }}
            </button>
            @include('front.user_profile.models.add_bank_account')
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr class="bg-accent-2-light">
                  <th class="p-4">{{ __('frontstaticword.A/CHolderName') }}</th>
                  <th class="p-4">{{ __('frontstaticword.Bankname') }}</th>
                  <th class="p-4">{{ __('frontstaticword.A/CNo') }}</th>
                  <th class="p-4">{{ __('frontstaticword.IFSCCode') }}</th>
                  <th class="text-center p-4">{{ __('frontstaticword.Edit') }}</th>
                </tr>
              </thead>
              <tbody>
                @if($banks->isNotEmpty())
                  @foreach($banks as $bank)
                  <tr>
                    <td class="p-4">{{ $bank->account_holder_name }}</td>
                    <td class="p-4">{{ $bank->bank_name }}</td>
                    <td class="p-4">{{ $bank->account_number }}</td>
                    <td class="p-4">{{ $bank->ifcs_code }}</td>
                    <td class="text-center p-4">
                      <button title="{{ __('frontstaticword.Edit') }}" class="btn btn-inline" type="button" data-bs-toggle="modal"
                        data-bs-target="#EditBankAccount-{{$bank->id}}">
                        <svg class="svg-resize-20 svg-stroke-accent">
                          <use xlink:href="{{ asset('/front/svg/sprite.svg#edit') }}" />
                        </svg>
                      </button>
                      @include('front.user_profile.models.edit_bank_account')
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" class="text-center p-5">
                      {{ __('frontstaticword.NoBankAccounts') }}
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
