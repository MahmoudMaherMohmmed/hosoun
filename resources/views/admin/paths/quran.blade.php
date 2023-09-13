@extends('admin.layouts.master')
@section('title', __('adminstaticword.QuranPath'))
@section('body')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.QuranPath') }}</h3>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Name') }}</th>
                                    <th>{{ __('adminstaticword.BirthDate') }}</th>
                                    <th>{{ __('adminstaticword.Mobile') }}</th>
                                    <th>{{ __('adminstaticword.Country') }}</th>
                                    <th>{{ __('adminstaticword.InstructorGender') }}</th>
                                    <th>{{ __('adminstaticword.SubPath') }}</th>
                                    <th>{{ __('adminstaticword.old_memorized') }}</th>
                                    <th>{{ __('adminstaticword.telawa_amount') }}</th>
                                    <th>{{ __('adminstaticword.old_ejazat') }}</th>
                                    <th>{{ __('adminstaticword.required_ejazat') }}</th>
                                    <th>{{ __('adminstaticword.required_qeraa') }}</th>
                                    <th>{{ __('adminstaticword.StartDate') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quranPath as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->birth_date }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->country->nicename }}</td>
                                    <td>{{ $item->instructor_gender==1 ? __('hosoun.maleInstructor') : __('hosoun.femaleInstructor') }}</td>
                                    <td>
                                        <span class="label label-success">{{ $subPathText[$item->sub_path]??null }}</span>
                                    </td>
                                    <td class="{{$item->sub_path!=1 ? 'bg-gray':''}}">
                                        <span class="label label-success">{{ $item->old_memorized }}</span>
                                    </td>
                                    <td class="{{$item->sub_path!=2 ? 'bg-gray':''}}">
                                        {{ $item->telawa_amount }}
                                    </td>
                                    <td class="text-center {{$item->sub_path!=3 ? 'bg-gray':''}}">
                                        @foreach (explode(',',$item->old_ejazat) as $old_ejazat)
                                            <span class="label label-success m-1">{{ $ejazatText[$old_ejazat]??null }}</span>
                                        @endforeach
                                    </td>
                                    <td class="{{$item->sub_path!=3 ? 'bg-gray':''}}">
                                        <span class="label label-success">{{ $ejazatText[$item->required_ejazat]??null }}</span>
                                        
                                    </td>
                                    <td class="{{$item->sub_path!=4 ? 'bg-gray':''}}">
                                        <span class="label label-success">{{ $qeraaText[$item->required_qeraa]??null }}</span>
                                    </td>
                                    <td>{{ $item->start_date }}</td>
                                    
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