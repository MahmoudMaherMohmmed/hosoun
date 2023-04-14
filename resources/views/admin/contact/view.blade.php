@extends('admin.layouts.master')
@section('title', __('adminstaticword.View') . ' ' . __('adminstaticword.Message') . ' - ' . __('adminstaticword.Admin'))
@section('body')
 
<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
    	<div class="box box-primary">
           	<div class="box-header with-border">
              	<h3 class="box-title">{{ __('adminstaticword.Message') }}</h3>
              	<a href="{{url('usermessage')}}" class="btn btn-success pull-right owtbtn">
                    {{ __('adminstaticword.Back') }}
                </a>
       		</div>
          	<div class="panel-body">
          		<div class="mailbox-read-info">
	                <h3>{{ $show->fname }}</h3>
	                <h5>{{ $show->email }}
	               	<h5>{{ __('adminstaticword.Phone') }}: {{ $show->mobile }}
	                  <span class="mailbox-read-time pull-right">{{ date('jS F Y', strtotime($show->created_at)) }}</span></h5>
	            </div>
				      <div class="box-body">
		            <div class="mailbox-read-message">
	                	<p>{{ $show->message }}</p>
	            	</div>
            	</div>
          	</div>
      	</div>
  	</div>
  </div>
</section>
@endsection