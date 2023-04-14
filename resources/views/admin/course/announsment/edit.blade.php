@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Announcement'))
@section('body')

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Announcement') }}</h3>
                    <a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form id="demo-form" method="post" action="{{url('announsment/'.$annou->id)}}"
                        data-parsley-validate>
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="course_id">{{ __('adminstaticword.SelectCourse') }}</label>
                                    <select id="course_id" name="course_id" class="form-control">
                                        @foreach($courses as $cou)
                                        <option class="display-none" value="{{ $cou->id }}"
                                            {{$annou->courses->id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="user">{{ __('adminstaticword.User') }}</label>
                                    <select id="user" name="user" class="form-control">
                                        @foreach($user as $cu)
                                        <option class="display-none" value="{{ $cu->id }}"
                                            {{$annou->user->id == $cu->id  ? 'selected' : ''}}>{{ $cu->fname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="editor4">{{ __('adminstaticword.Announcement') }}:<sup
                                            class="redstar">*</sup></label>
                                    <textarea name="announsment" id="editor4" rows="3"
                                        class="form-control">{{$annou->announsment}}</textarea>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label>{{ __('adminstaticword.Status') }}:</label>
                                <div class="toggler">
                                    <input class="tgl tgl-skewed" id="status" type="checkbox" name="status"
                                        {{ $annou->status == '1' ? 'checked' : '' }}>
                                    <label class="main-toggle toggle-lg {{ $annou->status == '1' ? 'on' : '' }}" for="status">
                                        <span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="free" value="0" for="status" id="status">
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>

@endsection