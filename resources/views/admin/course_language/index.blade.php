@extends('admin/layouts.master')
@section('title', __('adminstaticword.CourseLanguage') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.CourseLanguage') }}</h3>
                    <a data-toggle="modal" data-target="#myModaljjh" href="#" class="btn btn-info btn-sm">+
                        {{ __('adminstaticword.Add') }}</a>
                </div>
                <div class="box-body">


                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Language') }}</th>
                                    <th>{{ __('adminstaticword.Status') }}</th>
                                    <th>{{ __('adminstaticword.Edit') }}</th>
                                    <th>{{ __('adminstaticword.Delete') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=0;?>
                                @foreach($language as $cat)
                                <?php $i++;?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td>{{$cat->name}}</td>
                                    <td>
                                        <form action="{{ route('language.quick',$cat->id) }}" method="POST">
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

                                        @if(Auth::user()->role == "admin")
                                        <a class="table-edit" href="{{url('courselang/'.$cat->id.'/edit')}}"><i
                                                class='bx bx-edit'></i></a>
                                        @else
                                        <a type="submit" class="table-edit" data-toggle="tooltip" rel="tooltip"
                                            data-placement="top" disabled="disabled" title="Disabled"><i
                                                class='bx bx-edit'></i></a>
                                        @endif
                                    </td>

                                    <td>
                                        @if(Auth::user()->role == "admin")
                                        <form method="post" action="{{url('courselang/'.$cat->id)}}
                              " data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-null table-delete"><i
                                                    class='bx bx-trash'></i></button>
                                        </form>
                                        @else
                                        <a type="submit" class="table-delete" data-toggle="tooltip" rel="tooltip"
                                            data-placement="top" disabled="disabled" title="Disabled" <i
                                            class='bx bx-trash'></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Panel Body end-->
            </div>
            <!--Box Primary end-->

            <!--Model start-->
            <div class="modal fade" id="myModaljjh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.Add') }}
                                {{ __('adminstaticword.Language') }}</h4>
                        </div>
                        <div class="box box-primary">
                            <div class="panel panel-sum">
                                <div class="modal-body">
                                    <form id="demo-form2" method="post" action="{{ route('courselang.store') }}"
                                        data-parsley-validate class="">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-xs-12 col-md-8">
                                                <div class="form-group">
                                                    <label for="name">{{ __('adminstaticword.Name') }}:<sup
                                                            class="redstar">*</sup></label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Language') }}"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <div class="form-group">
                                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                                    <div class="toggler">
                                                        <input hidden id="welmail" type="checkbox" name="status">
                                                        <label class="main-toggle toggle-lg" for="welmail">
                                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                                        </label>
                                                    </div>
                                                    <input type="hidden" name="free" value="0" for="status" id="status">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col-xs-9"></div>
                                                <div class="col-xs-3">
                                                    <button type="submit"
                                                        class="btn btn-md col-xs-12 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Model close -->
        </div>
</section>

@endsection