@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Batch') . ' - ' . __('adminstaticword.Admin'))
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Batch') }}</h3>
                    <a href="{{url('batch')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating">
                        <i class="material-icons">
                            <button class="btn btn-xs btn-success abc">{{ __('adminstaticword.Back') }}</button> </i>
                    </a>
                </div>
                
                <div class="box-body">
                    <form action="{{url('batch/')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
        
                        <input type="hidden" class="form-control" name="user_id" id="exampleInputTitle"
                            value="{{ Auth::User()->id }}" required>
        
                        <div class="row">
        
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.Title') }}: <sup class="redstar">*</sup></label>
                                    <input type="title" class="form-control" name="title" id="title"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Title') }}"
                                        value="" required>
                                </div>
                            </div>
        
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="allowed_courses">{{ __('adminstaticword.Add') }}
                                        {{ __('adminstaticword.Course') }}: <span class="redstar">*</span></label>
                                    <select id="allowed_courses" class="form-control js-example-basic-single"
                                        name="allowed_courses[]" multiple="multiple" size="5" row="5"
                                        placeholder="{{ __('adminstaticword.Select') }} {{ __('adminstaticword.Course') }}">
                                        @foreach ($courses as $cat)
                                        @if($cat->status == 1)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="allowed_users">{{ __('adminstaticword.Add') }}
                                        {{ __('adminstaticword.Users') }}: <span class="redstar">*</span></label>
                                    <select id="allowed_users" class="form-control js-example-basic-single"
                                        name="allowed_users[]" multiple="multiple" size="5" row="5"
                                        placeholder="{{ __('adminstaticword.Select') }} {{ __('adminstaticword.Users') }}">
                                        @foreach ($users as $user)
                                        @if($user->status == 1)
                                        <option value="{{ $user->id }}">{{ $user->fname }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="detail">{{ __('adminstaticword.Detail') }}: <sup class="redstar">*</sup></label>
                                    <textarea id="detail" name="detail" rows="5" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}"></textarea>
                                </div>
                            </div>
        
                        </div>
        
                        <div class="row">
        
                            <div class="col-xs-12 col-md-6">
                                @if(Auth::User()->role == "admin")
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb3" type="checkbox" />
                                        <label class="main-toggle toggle-lg" for="cb3">
                                            <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="0" id="test">
                                </div>
                                @endif
                            </div>
        
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.PreviewImage') }}:</label> - <p class="inline info">
                                        {{ __('adminstaticword.RecommnadedSize') }}:
                                        250x150</p>
                                    <div>
                                        <input type="file" name="preview_image" id="image" class="inputfile inputfile-1" />
                                        <label for="image">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                <path
                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg>
                                            <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                        </label>
            
                                    </div>
                                </div>
                            </div>
        
                        </div>
        
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit"
                                    class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                            </div>
                        </div>
        
                    </form>
                </div>
                <!-- /.box -->
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</section>

@endsection

@section('scripts')


<script>
    (function ($) {
        "use strict";


        $(function () {
            $('.js-example-basic-single').select2();
        });

        $(function () {
            $('#cb1').change(function () {
                $('#j').val(+$(this).prop('checked'))
            })
        })

        $(function () {
            $('#cb3').change(function () {
                $('#test').val(+$(this).prop('checked'))
            })
        })

        $('#cb111').on('change', function () {

            if ($('#cb111').is(':checked')) {
                $('#pricebox').show('fast');

                $('#priceMain').prop('required', 'required');

            } else {
                $('#pricebox').hide('fast');

                $('#priceMain').removeAttr('required');
            }

        });

        $('#preview').on('change', function () {

            if ($('#preview').is(':checked')) {
                $('#document1').show('fast');
                $('#document2').hide('fast');
            } else {
                $('#document2').show('fast');
                $('#document1').hide('fast');
            }

        });

        $("#cb3").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', '1');
            } else {
                $(this).attr('value', '0');
            }
        });

        $(function () {

            $('#ms').change(function () {
                if ($('#ms').val() == 'yes') {
                    $('#doabox').show();
                } else {
                    $('#doabox').hide();
                }
            });

        });

        $(function () {

            $('#ms').change(function () {
                if ($('#ms').val() == 'yes') {
                    $('#doaboxx').show();
                } else {
                    $('#doaboxx').hide();
                }
            });

        });

        $(function () {

            $('#msd').change(function () {
                if ($('#msd').val() == 'yes') {
                    $('#doa').show();
                } else {
                    $('#doa').hide();
                }
            });

        });

        $(function () {
            var urlLike = '{{ url('
            admin / dropdown ') }}';
            $('#category_id').change(function () {
                var up = $('#upload_id').empty();
                var cat_id = $(this).val();
                if (cat_id) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: urlLike,
                        data: {
                            catId: cat_id
                        },
                        success: function (data) {
                            console.log(data);
                            up.append('<option value="0">Please Choose</option>');
                            $.each(data, function (id, title) {
                                up.append($('<option>', {
                                    value: id,
                                    text: title
                                }));
                            });
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            console.log(XMLHttpRequest);
                        }
                    });
                }
            });
        });

        $(function () {
            var urlLike = '{{ url('
            admin / gcat ') }}';
            $('#upload_id').change(function () {
                var up = $('#grand').empty();
                var cat_id = $(this).val();
                if (cat_id) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: urlLike,
                        data: {
                            catId: cat_id
                        },
                        success: function (data) {
                            console.log(data);
                            up.append('<option value="0">Please Choose</option>');
                            $.each(data, function (id, title) {
                                up.append($('<option>', {
                                    value: id,
                                    text: title
                                }));
                            });
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            console.log(XMLHttpRequest);
                        }
                    });
                }
            });
        });
    })(jQuery);
</script>

@endsection