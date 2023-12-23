@extends('admin.layouts.master')
@section('title', __('adminstaticword.Certificates'))
@section('body')

    <section class="content">
        @include('admin.message')
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> {{ __('adminstaticword.Certificates') }}</h3>
                        @if (Auth::User()->role == 'admin')
                            <a class="btn btn-info btn-md" href="{{ route('certificates.create') }}">
                                <i class="glyphicon glyphicon-th-l">+</i> {{ __('adminstaticword.MakeCertificate') }} {{ __('adminstaticword.User') }}</a>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('adminstaticword.User') }}</th>
                                        <th>{{ __('adminstaticword.Course') }}</th>
                                        <th>{{ __('adminstaticword.Status') }}</th>
                                        <th>{{ __('adminstaticword.View') }}</th>
                                        <th>{{ __('adminstaticword.Edit') }}</th>
                                        <th>{{ __('adminstaticword.Delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($certificates as $certificate)    
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                @if(Auth::user()->role == 'admin')
                                                    @if(isset($certificate->user))
                                                    {{ $certificate->user['fname'] }} {{ $certificate->user['lname'] }}
                                                    @endif
                                                @else
                                                    @if ($gsetting->hide_identity == 0)
                                                        @if(isset($certificate->user))
                                                        {{ $certificate->user['fname'] }} {{ $certificate->user['lname'] }}
                                                        @endif
                                                    @else
                                                        Hidden
                                                    @endif
                                                @endif
                                            </td>
                                            <td>

                                                @if ($certificate->course_id != null)
                                                    {{ $certificate->course['title'] }}
                                                @else
                                                    {{ $certificate->bundle['title'] }}
                                                @endif
                                            </td>


                                            <td>

                                                    <badge   type="Submit"
                                                        class="btn btn-xs {{ $certificate->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                        @if ($certificate->status == 1)
                                                            {{ __('adminstaticword.Active') }}
                                                        @else
                                                            {{ __('adminstaticword.Deactive') }}
                                                        @endif
                                                    </badge>
                                            </td>
                                            <td><a class="btn btn-primary btn-sm"
                                                    href="{{ url('/images/certificates/'.$certificate->file) }}" target="_blank">{{ __('adminstaticword.View') }}</a>
                                            </td>

                                            <td>
                                                <a class="table-edit" href="{{url('certificates/'.$certificate->id).'/edit'}}"><i class='bx bx-edit' ></i></a>
                                            </td>
                                            <td>
                                                <form method="post" action="{{ url('certificates/' . $certificate->id) }}"
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
