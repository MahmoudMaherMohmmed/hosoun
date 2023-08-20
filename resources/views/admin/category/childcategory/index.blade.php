@extends('admin/layouts.master')
@section('title', __('adminstaticword.ChildCategory'))
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.ChildCategory') }}</h3>
          <a href="{{url('childcategory/create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.AddChildCategory') }}</a> 
        </div>
     

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>#</th>
                  <th>{{ __('adminstaticword.SubCategory') }}</th>
                  <th>{{ __('adminstaticword.ChildCategory') }}</th>
                  <th>{{ __('adminstaticword.Icon') }}</th>
                  @if(Auth::User()->role == "admin")
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($childcategory as $cat)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td>@if(isset($cat->subcategory)){{$cat->subcategory->title}}@endif</td>
                  <td>{{$cat->title}}</td>
                  <td><i class="fa {{$cat->icon}}"></i></td>
                  @if(Auth::User()->role == "admin")
                  <td>
                    <form action="{{ route('childcategory.quick',$cat->id) }}" method="POST">
                      {{ csrf_field() }}
                      <button type="Submit" class="btn btn-xs table-status {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                        @if($cat->status ==1)
                        {{ __('adminstaticword.Active') }}
                        @else
                        {{ __('adminstaticword.Deactive') }}
                        @endif
                      </button>
                    </form>
                  </td>
                  <td>
                    <a class="table-edit" href="{{url('childcategory/'.$cat->id)}}"><i class='bx bx-edit' ></i></a>
                  </td>
                  <td>
                    <form  method="post" action="{{url('childcategory/'.$cat->id)}}"data-parsley-validate class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn-null table-delete">
                          <i class='bx bx-trash' ></i>
                      </button>
                    </form>
                  </td>
                  @endif
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
  <!-- /.row -->
</section>
@endsection
