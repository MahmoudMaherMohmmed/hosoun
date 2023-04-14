@extends('admin.layouts.master')
@section('title',__('adminstaticword.PlayerSettings') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.PlayerSettings') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('player.update') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>{{ __('adminstaticword.LogoEnable') }}:</label>
                                            <div class="toggler">
                                                <input hidden id="cb4" type="checkbox" name="logo_enable"
                                                    @if(isset($ps->logo_enable)) {{ $ps->logo_enable == '1' ? 'checked' : '' }}
                                                @endif/>
                                                <label class="main-toggle @if(isset($ps->logo_enable)) {{ $ps->logo_enable == '1' ? 'on' : '' }}
                                                    @endif" for="cb4">
                                                    <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="free" value="0" for="cb4" id="cb4">
                                        </div>
                                    </div>

                                    <div class="row">
                                        @if ($errors->has('logo'))
                                        <div class="display-none" id="logo">
                                            <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                        </div>
                                        @endif
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="logo">{{ __('adminstaticword.PlayerLogo') }}</label>- <p
                                                    class="inline info">{{ __('adminstaticword.Dimension') }}: 104 x 36</p>
                                                <div>
                                                    <input type="file" name="logo" value="@if(isset($ps->logo)){{ $ps['logo'] }} @endif"
                                                        id="logo"
                                                        class="{{ $errors->has('logo') ? ' is-invalid' : '' }} inputfile inputfile-1" />
                                                    <label for="logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
                                                            viewBox="0 0 20 17">
                                                            <path
                                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                            </svg> <span>{{ __('adminstaticword.ChooseaLogo') }}</span></label>
                                                    <span class="text-danger invalid-feedback" role="alert"></span>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                @if(optional($ps)['logo'] !="")
                                                <div class="logo-settings">
                                                    <img src="{{ asset('content/minimal_skin_dark/'.$ps['logo']) }}"
                                                        alt="{{ $ps['logo'] }}" class="img-responsive">
                                                </div>
                                                @else
                                                <div class="alert alert-danger">
                                                    {{ __('adminstaticword.Nologofound') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>{{ __('adminstaticword.ShareEnable') }}:</label>
                                            <div class="toggler">
                                                <input hidden id="cb3" type="checkbox" name="share_enable"
                                                    @if(isset($ps->share_enable)){{ $ps['share_enable'] == '1' ? 'checked' : '' }}
                                                @endif/>
                                                <label class="main-toggle @if(isset($ps->share_enable)){{ $ps['share_enable'] == '1' ? 'on' : '' }}
                                                    @endif " for="cb3">
                                                    <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="free" value="0" for="cb3" id="cb3">
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group display-none">
                                            <label for="CopyrightText">{{ __('adminstaticword.CopyrightText') }}<sup
                                                    class="redstar">*</sup></label>
                                            <input id="CopyrightText" value="copyright" name="cpy_text" type="text" class="form-control"
                                                placeholder="Enter Copyright Text" autocomplete="off" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>{{ __('adminstaticword.AutoPlay') }}:</label>
                                            <div class="toggler">
                                                <input hidden id="cb6" type="checkbox" name="autoplay"
                                                    @if(isset($ps->autoplay)) {{ $ps['autoplay'] == '1' ? 'checked' : '' }}
                                                @endif/>
                                                <label class="main-toggle @if(isset($ps->autoplay)) {{ $ps['autoplay'] == '1' ? 'on' : '' }}
                                                    @endif" for="cb6">
                                                    <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="free" value="0" for="cb6" id="cb6">
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>{{ __('adminstaticword.VideoDownload') }}:</label>
                                            <div class="toggler">
                                                <input hidden id="cb7" type="checkbox" name="download"
                                                    @if(isset($ps->download)) {{ $ps['download'] == '1' ? 'checked' : '' }}
                                                @endif/>
                                                <label class="main-toggle @if(isset($ps->download)) {{ $ps['download'] == '1' ? 'on' : '' }}
                                                    @endif" for="cb7">
                                                    <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="free" value="0" for="cb7" id="cb7">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9 col-md-10"></div>
                                <button value="" type="submit" class="btn btn-md col-xs-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $(function () {
        $('#logo_chk').change(function () {
            $('#status').val(+$(this).prop('checked'))
            var st = $('#status').val();
            if (st == 1) {
                $('#logo_upl').show();
                $('#logo_pre').show();
            } else {
                $('#logo_upl').hide();
                $('#logo_pre').hide();
            }
        })
    })

    $(function () {
        $('#share_chk').change(function () {
            $('#share_opt').val(+$(this).prop('checked'))
        })
    })
</script>
@endsection