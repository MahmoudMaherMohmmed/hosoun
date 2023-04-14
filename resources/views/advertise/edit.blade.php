@extends("admin/layouts.master")
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Ad'))
@section('stylesheet')
<style>
    .adl::first-letter {
        text-transform: uppercase
    }
</style>
@endsection
@section('body')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">


                @if($ad->ad_location == "onpause" || $ad->ad_location=="popup")

                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Ad') }}: {{ $ad->id }}
                        | {{ __('adminstaticword.Location') }}: <span class="adl">{{ $ad->ad_location }}</span></h3>
                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="{{ route('ad.update.solo',$ad->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group{{ $errors->has('ad_image') ? ' has-error' : '' }}">
                                    <label for="ad_image">
                                        @if($ad->ad_location == 'popup')
                                        Edit Popup Image
                                        @else
                                        {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Image') }}
                                        @endif
                                    </label>
                                    <input id="ad_image" name="ad_image" type="file" class="form-control">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ad_image') }}</strong>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('adminstaticword.CurrentImage') }}:</label>
                                    <img src="{{ asset('adv_upload/image/'.$ad->ad_image)}}" alt="" width="100px"
                                        class="img-responsive">
                                </div>

                                <div class="form-group">
                                    <label for="ad_target">{{ __('adminstaticword.Edit') }}
                                        {{ __('adminstaticword.AdTarget') }}:
                                        ({{ __('adminstaticword.ClickAdRedirect') }})</label>
                                    <input id="ad_target" class="form-control" type="text" name="ad_target"
                                        placeholder="http://" value="{{ $ad->ad_target }} ">
                                </div>
                            </div>
                        </div>


                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="submit" value="{{ __('adminstaticword.Save') }}"
                                        class="btn btn-md btn-primary">
                                    <a href="{{ route('ads') }}" class="btn btn-md btn-default"><i
                                            class="fa fa-reply"></i>
                                        {{ __('adminstaticword.Back') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @elseif($ad->ad_location == "skip")

                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Ad') }}: {{ $ad->id }}
                        | {{ __('adminstaticword.Location') }}: <span class="adl">{{ $ad->ad_location }}</span></h3>
                </div>

                <div class="panel-body">
                    <form action="{{ route('ad.update.video',$ad->id) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="row">
                            <div class="col-xs-12">

                                @if($ad->ad_video !="no")
                                <div class="form-group{{ $errors->has('ad_video') ? ' has-error' : '' }}">
                                    <label for="ad_video">{{ __('adminstaticword.Change') }}
                                        {{ __('adminstaticword.AdVideo') }}:</label>
                                    <input id="ad_video" type="file" class="form-control" name="ad_video">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ad_video') }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('adminstaticword.CurrentVideo') }}</label>
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset('adv_upload/video/'.$ad->ad_video) }}" type="video/mp4">
                                    </video>
                                </div>
                                @else
                                <div class="form-group" id="urlbox">
                                    <label for="ad_url">{{ __('adminstaticword.AdURL') }}:</label>
                                    <input id="ad_url" class="form-control" type="text" name="ad_url"
                                        value="{{ $ad->ad_url }}">
                                </div>
                                @endif


                                <div class="form-group">
                                    <label for="ad_target">{{ __('adminstaticword.Edit') }}
                                        {{ __('adminstaticword.AdTarget') }}:
                                        ({{ __('adminstaticword.ClickAdRedirect') }})</label>
                                    <input id="ad_target" class="form-control" type="text" value="{{ $ad->ad_target }}"
                                        name="ad_target" placeholder="http://">
                                </div>

                            </div>
                        </div>


                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="submit" value="{{ __('adminstaticword.Save') }}"
                                        class="btn btn-md btn-primary">
                                    <a href="{{ route('ads') }}" class="btn btn-md btn-default"><i
                                            class="fa fa-reply"></i>
                                        {{ __('adminstaticword.Back') }}</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>


                @endif
            </div>
        </div>
    </div>
</section>
@endsection