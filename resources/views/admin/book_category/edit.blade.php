@extends('admin/layouts.master')
@section('title', __('adminstaticword.EditCategory'))
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
                    <h3 class="box-title">{{ __('adminstaticword.EditCategory') }}</h3>
                    <a href="{{url('book-categories')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>

                <div class="panel-body">

                    <form id="demo-form" method="post" action="{{url('book-categories/'.$bookCategory->id)}}" data-parsley-validate class="form-label-left" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="title" id="title"  value="{{$bookCategory->title}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status" {{ $bookCategory->status == '1' ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $bookCategory->status == '1' ? 'on' : '' }}" for="status">
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
                                        required>{{$bookCategory->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <label for="image">{{ __('adminstaticword.PreviewImage') }}:</label> - <p class="inline info">size:
                                    250x150</p>
                                <div>
                                    <input type="file" name="image" id="image" class="inputfile inputfile-1" />
                                    <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                            viewBox="0 0 20 17">
                                            <path
                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span></label>
    
                                    @if(isset($bookCategory->image))
                                    <img src="{{ url('/images/book_categories/'.$bookCategory->image) }}" class="img-responsive" />
                                    @endif
                                </div>
                            </div>

                        </div>
                        <br>

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