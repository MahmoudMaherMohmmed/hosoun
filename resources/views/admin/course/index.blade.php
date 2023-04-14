@extends('admin/layouts.master')
@section('title', __('adminstaticword.View') . ' ' . __('adminstaticword.Course'))
@section('body')

<section class="content">
	@include('admin.course.partial.index')
</section>

@endsection
  