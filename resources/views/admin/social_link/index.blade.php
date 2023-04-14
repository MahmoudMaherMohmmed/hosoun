@extends('admin/layouts.master')
@section('title', __('adminstaticword.SocialLink') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.SocialLink') }}</h3>
                    <a class="btn btn-info btn-sm" href="{{url('social_link/create')}}">
                        <i class="glyphicon glyphicon">+</i> {{ __('adminstaticword.Add') }}</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
    
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Heading') }}</th>
                                    <th>{{ __('adminstaticword.Icon') }}</th>
                                    <th>{{ __('adminstaticword.Status') }}</th>
                                    <th>{{ __('adminstaticword.Edit') }}</th>
                                    <th>{{ __('adminstaticword.Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($social_links as $social_link)
                                <tr>
                                    <td>{{$social_link->id}}</td>
                                    <td>{{$social_link->title}}</td>
                                    <td><i class="fa {{$social_link->icon}}"></i></td>
                                    <td>
                                        <button class="btn btn-xs table-status {{ $social_link->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                            @if($social_link->status ==1)
                                            {{ __('adminstaticword.Active') }}
                                            @else
                                            {{ __('adminstaticword.Deactive') }}
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <a class="table-edit" href="{{route('social_link.edit',$social_link->id)}}">
                                            <i class='bx bx-edit'></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{url('social_link/'.$social_link->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-null table-delete"><i class='bx bx-trash'></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
@endsection