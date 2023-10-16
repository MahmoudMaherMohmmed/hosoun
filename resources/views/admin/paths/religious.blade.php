@extends('admin.layouts.master')
@section('title', __('adminstaticword.Religious'))
@section('body')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Religious') }}</h3>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Name') }}</th>
                                    <th>{{ __('adminstaticword.BirthDate') }}</th>
                                    <th>{{ __('adminstaticword.Mobile') }}</th>
                                    <th>{{ __('adminstaticword.Country') }}</th>
                                    <th>{{ __('adminstaticword.InstructorGender') }}</th>
                                    <th>{{ __('adminstaticword.preferredBook') }}</th>
                                    <th>{{ __('adminstaticword.Subject') }}</th>
                                    <th>{{ __('adminstaticword.StartDate') }}</th>
                                    <th>{{ __('adminstaticword.Action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($religious as $key=>$item)
                                <tr class="{{$item->done_flag ==1 ? 'bg-success':''}}">
                                    <td class="{{$item->done_flag ==1 ? 'bg-success':''}}">{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->birth_date }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->country->nicename }}</td>
                                    <td>{{ $item->instructor_gender==1 ? __('hosoun.maleInstructor') : __('hosoun.femaleInstructor') }}</td>
                                    <td>

                                    </td>
                                    <td>
                                        @if($item->subject_id==1)
                                        {{ __('hosoun.aqeda') }}
                                        @elseif($item->subject_id==2)
                                        {{ __('hosoun.fekh') }}
                                        @elseif($item->subject_id==3)
                                        {{ __('hosoun.tafsir') }}
                                        @elseif($item->subject_id==4)
                                        {{ __('hosoun.seerah') }}
                                        @elseif($item->subject_id==5)
                                        {{ __('hosoun.hadeeth') }}
                                        @endif
                                    </td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>
                                        @if($item->done_flag ==1)
                                        <span class="label label-success">{{ __('Done') }}</span>

                                        @else
                                        <form action="{{ route('religious-paths.quick',$item->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="Submit"
                                                class="btn btn-xs table-status btn-warning text-black }}">

                                                {{ __('Mark Done') }}

                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection