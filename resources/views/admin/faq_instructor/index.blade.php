@extends('admin/layouts.master')
@section('title', __('adminstaticword.FAQInstructor') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.FAQInstructor') }}</h3>
          <a href="{{url('faqinstructor/create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              
              <tr>
                <th>#</th>
                <th>{{ __('adminstaticword.Title') }}</th>
                <th>{{ __('adminstaticword.Detail') }}</th>
                <th>{{ __('adminstaticword.Status') }}</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </tr>
            </thead>
            <tbody>
            @foreach($faq as $key=>$p)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$p->title}}</td>                 
                <td>{{ str_limit(strip_tags($p->details), $limit = 50, $end = '...') }}</td>
                <td>
                  <form action="{{ route('faqInstructor.quick',$p->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="Submit" class="btn btn-xs table-status {{ $p->status ==1 ? 'btn-success' : 'btn-danger' }}">
                      @if($p->status ==1)
                      {{ __('adminstaticword.Active') }}
                      @else
                      {{ __('adminstaticword.Deactive') }}
                      @endif
                    </button>
                  </form>
                </td>
                <td><a class="table-edit" href="{{url('faqinstructor/'.$p->id.'/edit')}}">
                    <i class='bx bx-edit' ></i></a>
                </td>
                <td>
                  <form  method="post" action="{{url('faqinstructor/'.$p->id)}}"
                      data-parsley-validate class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    <button type="submit" class="btn-null table-delete">
                          <i class='bx bx-trash' ></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach 
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
