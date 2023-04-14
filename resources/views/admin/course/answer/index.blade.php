<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a data-toggle="modal" data-target="#myModalanswer" href="#" class="btn btn-info btn-sm">+
                {{ __('adminstaticword.Add') }}</a>

            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('adminstaticword.Question') }}</th>
                            <th>{{ __('adminstaticword.Answer') }}</th>
                            <th>{{ __('adminstaticword.Status') }}</th>
                            <th>{{ __('adminstaticword.Edit') }}</th>
                            <th>{{ __('adminstaticword.Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @foreach($answers as $ans)
                        <tr>
                            <?php $i++;?>
                            <td><?php echo $i;?></td>
                            <td>{{strip_tags($ans->question['question'])}}</td>
                            <td>{{strip_tags($ans->answer)}}</td>
                            
                            <td>
								<form action="{{ route('answer.quick',$ans->id) }}" method="POST">
									{{ csrf_field() }}
									<button type="Submit"
										class="btn btn-xs table-status {{ $ans->status ==1 ? 'btn-success' : 'btn-danger' }}">
										@if($ans->status ==1)
										{{ __('adminstaticword.Active') }}
										@else
										{{ __('adminstaticword.Deactive') }}
										@endif
									</button>
								</form>
							</td>

                            <td>
                                <a class="table-edit" href="{{route('courseanswer.edit',$ans->id)}}"><i class='bx bx-edit'></i></a>
                            </td>

                            <td>
                                <form method="post" action="{{url('courseanswer/'.$ans->id)}}" data-parsley-validate class="form-horizontal form-label-left">
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
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!--Model start-->
    <div class="modal fade" id="myModalanswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }}
                        {{ __('adminstaticword.Question') }}</h4>
                </div>
                <div class="box box-primary">
                    <div class="panel panel-sum">
                        <div class="modal-body">
                            <form id="demo-form2" method="post" action="{{url('courseanswer/')}}" data-parsley-validate>
                                {{ csrf_field() }}

                                <input type="hidden" name="instructor_id" class="form-control"
                                    value="{{ Auth::User()->id }}" />
                                <input type="hidden" name="ans_user_id" value="{{Auth::user()->id}}" />

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="question_id">{{ __('adminstaticword.SelectQuestion') }}:<sup class="redstar">*</sup></label>
                                            <select id="question_id" name="question_id" required
                                                class="form-control js-example-basic-single">
                                                <option value="none" selected disabled hidden>
                                                    {{ __('adminstaticword.SelectanOption') }}
                                                </option>
                                                @foreach($questions as $ques)
                                                <option value="{{ $ques->id }}">{{ $ques->question}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    @foreach($questions as $ques)
                                    <input type="hidden" name="ques_user_id" value="{{$ques->user_id}}" />
                                    <input type="hidden" name="course_id" value="{{$ques->course_id}}" />
                                    @endforeach
                                    
                                    <div class="col-xs-12">
                                        <label for="answer">{{ __('adminstaticword.Answer') }}:<sup
                                                class="redstar">*</sup></label>
                                        <textarea id="answer" name="answer" rows="4" class="form-control"></textarea>
                                    </div>

                                    <div class="col-xs-12">
                                        <label>{{ __('adminstaticword.Status') }}:</label>
                                        <div class="toggler">
                                            <input hidden id="c12" type="checkbox" />
                                            <label class="main-toggle toggle-lg" for="c12">
                                                <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="status" value="1" id="t12">
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-xs-9"></div>
                                        <button type="submit" value="Add Answer" class="btn btn-md col-xs-3 btn-primary">+
                                            {{ __('adminstaticword.Save') }}</button>
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
</section>