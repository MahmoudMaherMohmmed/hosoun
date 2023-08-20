@extends('admin/layouts.master')
@section('title', __('adminstaticword.Category'))
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Category') }}</h3>
                    <a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                        + {{ __('adminstaticword.AddCategory') }}
                    </a>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Image') }}</th>
                                    <th>{{ __('adminstaticword.Category') }}</th>
                                    <th>{{ __('adminstaticword.Icon') }}</th>
                                    <th>{{ __('adminstaticword.Slug') }}</th>
                                    @if(Auth::User()->role == "admin")
                                    <th>{{ __('adminstaticword.Featured') }}</th>
                                    <th>{{ __('adminstaticword.Status') }}</th>
                                    <th>{{ __('adminstaticword.Edit') }}</th>
                                    <th>{{ __('adminstaticword.Delete') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                <?php $i=0;?>
                                @foreach($cate as $cat)
                                <?php $i++;?>
                                <tr class="sortable" id="id-{{ $cat->id }}">
                                    <td><?php echo $i;?></td>
                                    <td>
                                        @if($cat['cat_image'] !== NULL && $cat['cat_image'] !== '')
                                        <img src="images/category/<?php echo $cat['cat_image'];  ?>"
                                            class="img-responsive">
                                        @else
                                        <img src="{{ Avatar::create($cat->title)->toBase64() }}" class="img-responsive">
                                        @endif
                                    </td>
                                    <td>{{$cat->title}}</td>
                                    <td><i class="fa {{$cat->icon}}"></i></td>
                                    <td>{{$cat->slug}}</td>
                                    @if(Auth::User()->role == "admin")
                                    <td>
                                        <form action="{{ route('categoryf.quick',$cat->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="Submit"
                                                class="btn btn-xs table-status {{ $cat->featured ==1 ? 'btn-success' : 'btn-danger' }}">
                                                @if($cat->featured ==1)
                                                {{ __('adminstaticword.Yes') }}
                                                @else
                                                {{ __('adminstaticword.No') }}
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('category.quick',$cat->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="Submit"
                                                class="btn btn-xs table-status {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                                @if($cat->status ==1)
                                                {{ __('adminstaticword.Active') }}
                                                @else
                                                {{ __('adminstaticword.Deactive') }}
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="table-edit" href="{{url('category/'.$cat->id)}}"><i class='bx bx-edit' ></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{url('category/'.$cat->id)}}" data-parsley-validate
                                            class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-null table-delete"><i class='bx bx-trash' ></i></button>
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


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></a>
                    <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.AddCategory') }}
                    </h4>
                </div>
                <div class="modal-body">
                    <form id="demo-form2" method="post" action="{{url('category/')}}"
                        data-parsley-validate class="form-label-left" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="c_name">{{ __('adminstaticword.Name') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input id="c_name" placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.CategoryName') }}" type="text" class="form-control" name="title" required="">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="icon">{{ __('adminstaticword.Icon') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input id="icon" type="text" class="form-control icp-auto icp" name="icon" required placeholder="{{ __('adminstaticword.ChooseIcon') }}">
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Featured') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="featured" type="checkbox" name="featured">
                                        <label class="main-toggle toggle-lg" for="featured">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" for="featured" id="featured">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status">
                                        <label class="main-toggle toggle-lg" for="status">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" for="status" id="status">
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="image">{{ __('adminstaticword.PreviewImage') }}:</label> - <p
                                        class="inline info">size: 250x150</p>
                                    <div>
                                        <input type="file" name="image" id="image" class="inputfile inputfile-1" />
                                        <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                            <path
                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg>
                                            <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-9"></div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-primary col-xs-12">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });

    $("#sortable").sortable({
        update: function (e, u) {
            var data = $(this).sortable('serialize');

            $.ajax({
                url: "{{ route('category_reposition') }}",
                type: 'get',
                data: data,
                dataType: 'json',
                success: function (result) {
                    console.log(data);
                }
            });

        }

    });
</script>

@endsection