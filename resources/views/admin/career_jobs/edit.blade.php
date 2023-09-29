@extends('admin/layouts.master')

@section('title', __('adminstaticword.EditCareerJob'))

@section('body')
<section class="content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.EditCareerJob') }}</h3>
                    <a href="{{url('career-jobs')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>

                <div class="panel-body">

                    <form id="demo-form" method="post" action="{{url('career-jobs/'.$careerJob->id)}}" data-parsley-validate class="form-label-left" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}



                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="title" id="title"  value="{{$careerJob->title}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status" {{ $careerJob->status == '1' ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $careerJob->status == '1' ? 'on' : '' }}" for="status">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <label for="description">{{ __('adminstaticword.ShortDetail') }}: <sup class="redstar">*</sup></label>
                                    <textarea id="description" name="description" rows="3" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ShortDetail') }}"
                                        required>{{$careerJob->description}}</textarea>
                                </div>
                            </div>
                        </div>  

                        
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="description">{{ __('adminstaticword.ShortDetail') }}: <sup class="redstar">*</sup></label>
                                    <textarea id="description" name="description" rows="3" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ShortDetail') }}"
                                        required>{{ (old('description',$careerJob->description)) }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="responsibilities">{{ __('adminstaticword.Responsibilities') }}: <sup class="redstar">*</sup></label>
                                    <textarea id="responsibilities" name="responsibilities" rows="3" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Responsibilities') }}"
                                        required>{{ (old('responsibilities',$careerJob->responsibilities)) }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="requirements">{{ __('adminstaticword.Requirements') }}: <sup class="redstar">*</sup></label>
                                    <textarea id="requirements" name="requirements" rows="3" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Requirements') }}"
                                        required>{{ (old('requirements',$careerJob->requirements)) }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="apply_method">{{ __('adminstaticword.ApplyMethod') }}: <sup class="redstar">*</sup></label>
                                    <textarea id="apply_method" name="apply_method" rows="3" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ApplyMethod') }}"
                                        required>{{ (old('apply_method',$careerJob->apply_method)) }}</textarea>
                                </div>
                            </div>

                            
                            <div class="col-xs-12 col-md-2">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Full-Time') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="tags[0]" type="checkbox" name="tags[0]" value="full-time" {{str_contains($careerJob->tags,'full-time')?'checked':''}}>
                                        <label class="main-toggle toggle-lg {{str_contains($careerJob->tags,'full-time')?'on':''}}" for="tags[0]">
                                            <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Part-Time') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="tags[1]" type="checkbox" name="tags[1]" value="part-time"  {{str_contains($careerJob->tags,'part-time')?'checked':''}}>
                                        <label class="main-toggle toggle-lg {{str_contains($careerJob->tags,'part-time')?'on':''}}" for="tags[1]">
                                            <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-8 col-md-10"></div>
                                <div class="col-xs-4 col-md-2">
                                    <button type="submit" class="btn btn-md col-xs-12 btn-primary">{{ __('adminstaticword.Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
