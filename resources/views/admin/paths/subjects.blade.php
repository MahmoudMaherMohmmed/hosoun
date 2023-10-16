@extends('admin.layouts.master')
@section('title', __('adminstaticword.Subjects'))
@section('body')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Subjects') }}</h3>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Name') }}</th>
                                    <th>{{ __('adminstaticword.BirthDate') }}</th>
                                    <th>{{ __('adminstaticword.Mobile') }}</th>
                                    <th>{{ __('adminstaticword.Country') }}</th>
                                    <th>{{ __('adminstaticword.InstructorGender') }}</th>
                                    <th>{{ __('adminstaticword.Class') }}</th>
                                    <th>{{ __('adminstaticword.Subject') }}</th>
                                    <th>{{ __('adminstaticword.StartDate') }}</th>
                                    <th>{{ __('adminstaticword.Action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $key=>$subject)
                                <tr class="{{$subject->done_flag ==1 ? 'bg-success':''}}">
                                    <td class="{{$subject->done_flag ==1 ? 'bg-success':''}}">{{ $key+1 }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->birth_date }}</td>
                                    <td>{{ $subject->mobile }}</td>
                                    <td>{{ $subject->country->nicename }}</td>
                                    <td>{{ $subject->instructor_gender==1 ? __('hosoun.maleInstructor') : __('hosoun.femaleInstructor') }}</td>
                                    <td>
                                        @if($subject->class_id==1)
                                            {{ __('hosoun.subjectClasses.kg1') }}
                                        @elseif($subject->class_id==2)
                                            {{ __('hosoun.subjectClasses.kg2') }}
                                        @elseif($subject->class_id==3)
                                            {{ __('hosoun.subjectClasses.firstPrimary') }}
                                        @elseif($subject->class_id==4)
                                            {{ __('hosoun.subjectClasses.secondPrimary') }}
                                        @elseif($subject->class_id==5)
                                            {{ __('hosoun.subjectClasses.thirdPrimary') }}
                                        @elseif($subject->class_id==6)
                                            {{ __('hosoun.subjectClasses.fourthPrimary') }}
                                        @elseif($subject->class_id==7)
                                            {{ __('hosoun.subjectClasses.fifthPrimary') }}
                                        @elseif($subject->class_id==8)
                                            {{ __('hosoun.subjectClasses.sixthPrimary') }}
                                        @elseif($subject->class_id==9)
                                            {{ __('hosoun.subjectClasses.firstMiddleSchool') }}
                                        @elseif($subject->class_id==10)
                                            {{ __('hosoun.subjectClasses.secondMiddleSchool') }}
                                        @elseif($subject->class_id==11)
                                            {{ __('hosoun.subjectClasses.thirdMiddleSchool') }}
                                        @elseif($subject->class_id==12)
                                            {{ __('hosoun.subjectClasses.firstSecondary') }}
                                        @elseif($subject->class_id==13)
                                            {{ __('hosoun.subjectClasses.secondSecondary') }}
                                        @elseif($subject->class_id==14)
                                            {{ __('hosoun.subjectClasses.thirdSecondary') }}
                                        @else
                                            {{ __('hosoun.subjectClasses.university') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($subject->subject_id==1)
                                            {{ __('hosoun.subjects.establishing') }}
                                        @elseif($subject->subject_id==2)
                                            {{ __('hosoun.subjects.arabicLanguage') }}
                                        @elseif($subject->subject_id==3)
                                            {{ __('hosoun.subjects.islamicStudies') }}
                                        @elseif($subject->subject_id==4)
                                            {{ __('hosoun.subjects.english') }}
                                        @elseif($subject->subject_id==5)
                                            {{ __('hosoun.subjects.mathematics') }}
                                        @elseif($subject->subject_id==6)
                                            {{ __('hosoun.subjects.sciences') }}
                                        @elseif($subject->subject_id==7)
                                            {{ __('hosoun.subjects.physics') }}
                                        @elseif($subject->subject_id==8)
                                            {{ __('hosoun.subjects.alive') }}
                                        @elseif($subject->subject_id==9)
                                            {{ __('hosoun.subjects.chemistry') }}
                                        @elseif($subject->subject_id==10)
                                            {{ __('hosoun.subjects.science') }}
                                        @elseif($subject->subject_id==11)
                                            {{ __('hosoun.subjects.math') }}
                                        @elseif($subject->subject_id==12)
                                            {{ __('hosoun.subjects.french') }}
                                        @elseif($subject->subject_id==13)
                                            {{ __('hosoun.subjects.abilitiesAndAchievement') }}
                                        @else
                                            {{ __('hosoun.subjects.generalReviews') }}
                                        @endif
                                    </td>
                                    <td>{{ $subject->start_date }}</td>
                                    <td>
                                        @if($subject->done_flag ==1)
                                        <span class="label label-success">{{ __('Done') }}</span>

                                        @else
                                        <form action="{{ route('subject-paths.quick',$subject->id) }}" method="POST">
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