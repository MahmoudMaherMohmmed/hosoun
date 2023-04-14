@extends('admin.layouts.master')
@section('title', __('adminstaticword.GetStarted') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.GetStarted') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('GetstartedController@update') }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="heading">{{ __('adminstaticword.Heading') }}</label>
                                    <input id="heading" value="{{ optional($show)['heading'] }}" autofocus name="heading" type="text"
                                        class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Heading') }}" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="sub_heading">{{ __('adminstaticword.SubHeading') }}</label>
                                    <input id="sub_heading" value="{{ optional($show)['sub_heading'] }}" autofocus name="sub_heading"
                                        type="text" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.SubHeading') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="button_txt">{{ __('adminstaticword.ButtonText') }}</label>
                                    <input id="button_txt" value="{{ optional($show)['button_txt'] }}" autofocus name="button_txt"
                                        type="text" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ButtonText') }}" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="link">{{ __('adminstaticword.ButtonLink') }}</label>
                                    <input id="link" value="{{ optional($show)['link'] }}" name="link" type="text"
                                        class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ButtonLink') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">{{ __('adminstaticword.BackgroundImage') }}<sup
                                            class="redstar">*</sup></label>
                                    <div>
                                        <input type="file" name="image" id="image" class="inputfile inputfile-1" />
                                        <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                viewBox="0 0 20 17">
                                                <path
                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                        </label>
                                    </div>
                                    <img src="{{ url('/images/getstarted/'.optional($show)['image']) }}"
                                        class="img-responsive" />
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button value="" type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection