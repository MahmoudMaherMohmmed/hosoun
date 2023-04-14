@extends('admin.layouts.master')
@section('title', __('adminstaticword.Advertise'))

@section('stylesheet')
<style>
    .fl::first-letter {
        text-transform: uppercase
    }
</style>
@endsection
@section('body')
<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Advertise') }}</h3>
                </div>
                <br>

                @php
                $ads = App\Ads::all();
                @endphp
                <div class="box-header">
                    <a href="{{ route('ad.create') }}" class="btn btn-md btn-info">+
                        {{ __('adminstaticword.CreateAd') }}</a>

                    <!-- Delete Modal -->
                    <a type="button" class="btn btn-danger btn-md z-depth-0" data-toggle="modal"
                        data-target="#bulk_delete"><i class="fa fa-fw fa-trash-o"></i>
                        {{ __('adminstaticword.Delete') }} {{ __('adminstaticword.Selected') }}</a>
                </div>

                <!-- Modal -->
                <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="delete-icon"></div>
                            </div>
                            <div class="modal-body text-center">
                                <i class='bx bx-trash'></i>
                                <h4 class="modal-heading">{{ __('adminstaticword.AreYouSure') }}</h4>
                                <p>{{ __('adminstaticword.DeleteRecords') }}</p>
                            </div>
                            <div class="modal-footer">

                                <form method="post" action="{{ action('AdsController@bulk_delete') }}"
                                    id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
                                    {{ csrf_field() }}

                                    <button type="reset" class="btn btn-gray translate-y-3"
                                        data-dismiss="modal">{{ __('adminstaticword.No') }}</button>
                                    <button type="submit" class="btn btn-danger">{{ __('adminstaticword.Yes') }}</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="content-block box-body">
                    <div class="table-responsive">
                        <table id="full_detail_table" class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="inline">
                                            <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                                value="all" id="checkboxAll">
                                            <label for="checkboxAll" class="material-checkbox"></label>
                                        </div>
                                    </th>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.AdType') }}</th>
                                    <th>{{ __('adminstaticword.AdLocation') }}</th>
                                    <th>{{ __('adminstaticword.Edit') }}</th>
                                    <th>{{ __('adminstaticword.Action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                    @php $i=0; @endphp
                                    @foreach($ads as $ad)
                                    @php $i++ @endphp
                                <tr>

                                    <td>
                                        <div class="inline">
                                            <input type="checkbox" form="bulk_delete_form"
                                                class="filled-in material-checkbox-input" name="checked[]"
                                                value="{{$ad->id}}" id="checkbox{{$ad->id}}">
                                            <label for="checkbox{{$ad->id}}" class="material-checkbox"></label>
                                        </div>
                                    </td>

                                    <td>{{ $i }}</td>
                                    <td class="fl">{{ $ad->ad_type }}</td>
                                    <td class="fl">{{ $ad->ad_location }}</td>
                                    <td><a href="{{ route('ad.edit',$ad->id) }}" class="table-edit"><i
                                                class='bx bx-edit'></i></a></td>
                                    <td>
                                        <i class='bx bx-trash' data-toggle="modal" data-target="#bulk_delete"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(function () {
        $('#checkboxAll').on('change', function () {
            if ($(this).prop("checked") == true) {
                $('.material-checkbox-input').attr('checked', true);
            } else if ($(this).prop("checked") == false) {
                $('.material-checkbox-input').attr('checked', false);
            }
        });
    });
</script>
@endsection