@extends('admin.layouts.master')
@section('title', __('adminstaticword.AdvertiseSettings'))

@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.AdvertiseSettings') }}</h3>
                </div>
                <br>

                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                data-toggle="tab">Skip AD Setting</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                data-toggle="tab">Pop Up Ad Setting</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                            <form action="{{ route('ad.update') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="form-group">
                                            <label for="">Skip AD Timer</label>
                                            <select name="timer_check" id="timer" class="form-control">
                                                <option value="no">{{ __('adminstaticword.No') }}</option>
                                                <option value="yes">{{ __('adminstaticword.Yes') }}</option>
                                            </select>
                                        </div>

                                        <div style="display: none;" id="t">
                                            <div class="form-group">
                                                <label for="ad_timer">{{ __('adminstaticword.Time') }} : ( Please Ensure
                                                    that its not conflict with popup ad start
                                                    time )</label>
                                                <input id="ad_timer" type="text" placeholder="00:00:10" name="ad_timer"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="ad_hold">{{ __('adminstaticword.Ad') }}
                                                    {{ __('adminstaticword.HoldTime') }}: </label>
                                                <input id="ad_hold" type="number" name="ad_hold" min="0" max="10"
                                                    placeholder="eg. 5" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-xs-9"></div>
                                        <input type="submit" value="{{ __('adminstaticword.Save') }}"
                                            class="btn btn-md col-xs-3 btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div role="tabpanel" class="fade tab-pane" id="profile">
                            <form action="{{ route('ad.pop.update') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="time">{{ __('adminstaticword.StartTime') }}: <span
                                                    class="help-block">( Please Ensure that its not conflict
                                                    with video ad start time )</span></label>
                                            <input id="time" type="text" name="time" placeholder="00:00:10"
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="endtime">{{ __('adminstaticword.EndTime') }}: </label>
                                            <input id="endtime" type="text" name="endtime" placeholder="00:00:30"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-xs-9"></div>
                                        <input type="submit" value="{{ __('adminstaticword.Save') }}"
                                            class="btn btn-md col-xs-3 btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>


@endsection
@section('scripts')
<script type="text/javascript">
    $('#timer').change(function () {
        if ($(this).val() == 'no') {
            $('#t').hide();
        } else {
            $('#t').show();
        }
    });
</script>
@endsection