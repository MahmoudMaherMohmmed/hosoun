@extends('admin.layouts.master')
@section('title', __('adminstaticword.View') . ' ' . __('adminstaticword.Instructor') . ' - ' . __('adminstaticword.Admin'))
@section('body')
 
<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
    	<div class="box box-primary">
           	<div class="box-header with-border">
          	<h3 class="box-title">{{ __('adminstaticword.InstructorRequest') }}</h3>
          	<a href="{url('requestinstructor')}}" class="btn btn-success pull-right owtbtn">
                {{ __('adminstaticword.Back') }}
            </a>
       		</div>
          	<div class="panel-body">

          		<div class="view-instructor">
                    <div class="instructor-detail">
                    	<ul>
                    		<li><img src="{{ asset('images/instructor/'.$show->image) }}" class="img-circle"/></li>
                    		<li>{{ __('adminstaticword.Name') }}: {{ $show->fname }} {{ $show['lname'] }}</li>
                    		<li>{{ __('adminstaticword.Role') }}: {{ $show->role }}</li>
                    		<li>{{ __('adminstaticword.Phone') }}: {{ $show->mobile }}</li>
                    		<li>{{ __('adminstaticword.Email') }}: {{ $show->email }}</li>
                    		<li>{{ __('adminstaticword.Detail') }}: {{ $show->detail }}</li>
                    		<li>{{ __('adminstaticword.Resume') }}: <a href="{{ asset('files/instructor/'.$show->file) }}" download="{{$show->file}}">{{ __('adminstaticword.Download') }} <i class="fa fa-download"></i></a></li>

                    	</ul>
                    </div>
          		</div>
	              

	            <form action="{{route('requestinstructor.update',$show->id)}}" method="POST" enctype="multipart/form-data">
	                {{ csrf_field() }}
	                {{ method_field('PUT') }}

	                <input type="hidden" value="{{ $show->user_id }}" name="user_id" class="form-control">
					        <input type="hidden" value="{{ $show->role }}" name="role" class="form-control">
                  <input type="hidden" value="{{ $show->mobile }}" name="mobile" class="form-control">
                  <input type="hidden" value="{{ $show->detail }}" name="detail" class="form-control">
                  <input type="hidden" value="{{ $show->image }}" name="image" class="form-control">

	              	<div class="row">
	                  <div class="col-xs-12">
	                   <div class="form-group">
    	                    <label>{{ __('adminstaticword.Status') }}:</label>
    	                    <li class="toggler">
        	                    <input hidden id="cb333" type="checkbox" {{ $show->status==1 ? 'checked' : '' }}>
        	                    <label class="main-toggle toggle-lg {{ $show->status==1 ? 'on' : '' }}" for="cb333">
        	                        <span data-off="{{ __('adminstaticword.Pending') }}" data-on="{{ __('adminstaticword.Approved') }}"></span>
        	                    </label>
    	                    </li>
    	                    <input type="hidden" name="status" value="{{ $show->status }}" id="c33">
	                   </div>
		              </div>
	                  
	              	</div>
	              	
	              	<div class="row">
	              	    <div class="col-xs-9"></div>
    	              	<button value="" type="submit"  class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
	              	</div>
	          	</form>
          	</div>
      	</div>
  	</div>
  </div>
</section>
@endsection
