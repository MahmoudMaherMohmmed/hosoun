@extends('admin/layouts.master')
@section('title', __('adminstaticword.Directory') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">

  @include('admin.message')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('adminstaticword.Directory') }}</h3>
        <a class="btn btn-info btn-sm" href="{{url('directory/create')}}">
          <i class="glyphicon glyphicon">+</i> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Directory') }}
        </a>
      </div>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">

              <thead>

                <tr>
                  <th>#</th>
                  <th>{{ __('adminstaticword.Title') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                  <th>{{ __('adminstaticword.View') }}</th>
                </tr>
              </thead>

              <tbody>
                <?php $i=0;?>
                 
                    @foreach($directory as $dir)
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>{!! $dir->detail !!}</td>
                        <td>
                            @if($dir->status ==1)
                                <span class="table-status status-approved">
                                    {{ __('adminstaticword.Active') }}
                                </span>
                            @else
                                <span class="table-status status-rejected">
                                    {{ __('adminstaticword.Deactive') }}
                                </span>
                            @endif
                        </td>

                        <td>
                          <a class="table-edit" href="{{ route('directory.show',$dir->id) }}">
                          <i class='bx bx-edit' ></i></a>
                        </td>

                        <td>
                          <form  method="post" action="{{url('directory/'.$dir->id)}}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn-null table-delete"><i class='bx bx-trash' ></i></button>
                          </form>
                        </td>

                        <td>
                          <a class="btn btn-success btn-sm" target="blank" href="{{ route('directory.view',['id' => $dir->id, 'city' => str_slug(str_replace('-','&',$dir->city))]) }}">
                          {{ __('adminstaticword.View') }}</a>
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
