<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <a data-toggle="modal" data-target="#myModalabcdef" href="#" class="btn btn-info btn-sm">+
                {{ __('adminstaticword.Add') }}</a>
            <br>
            <br>
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('adminstaticword.Course') }}</th>
                            <th>{{ __('adminstaticword.Announcement') }}</th>
                            <th>{{ __('adminstaticword.Status') }}</th>
                            <th>{{ __('adminstaticword.Edit') }}</th>
                            <th>{{ __('adminstaticword.Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @foreach($cor->announsment as $an)
                        <tr>
                            <?php $i++;?>
                            <td><?php echo $i;?></td>
                            <td>{{$an->courses->title}}</td>
                            <td>{{ str_limit($an->announsment, $limit = 70, $end = '....')}}</td>
                            <td>
                                @if($an->status==1)
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
                                <a class="table-edit" href="{{url('announsment/'.$an->id)}}"><i class='bx bx-edit'></i></a>
                            </td>

                            <td>
                                <form method="post" action="{{url('announsment/'.$an->id)}}" ata-parsley-validate
                                    class="form-horizontal form-label-left">
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
    </div>

    <!--Model start-->
    <div class="modal fade" id="myModalabcdef" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Announcement') }}</h4>
                </div>
                <div class="box box-primary">
                    <div class="panel panel-sum">
                        <div class="modal-body">
                            <form id="demo-form2" method="post" action="{{ route('announsment.store') }}"
                                data-parsley-validate>
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="from-group">
                                            <label for="course_id"> {{ __('adminstaticword.Course') }}<span class="required">*</span></label>
                                            <select id="course_id" name="course_id" class="form-control">
                                                <option value="{{ $cor->id }}">{{ $cor->title }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="user_id">{{ __('adminstaticword.User') }}</label>
                                            <select id="user_id" name="user_id" class="form-control">
                                                @php
                                                $users = App\User::all();
                                                @endphp
                                                @foreach($users as $us)
                                                <option value="{{$us->id}}">{{$us->fname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label for="editor6">{{ __('adminstaticword.Announcement') }}:<sup
                                                class="redstar">*</sup></label>
                                        <textarea name="announsment" id="editor6" rows="2" class="form-control"
                                            placeholder="Enter Your Announcement"></textarea>
                                    </div>

                                    <div class="col-xs-12">
                                        <label>{{ __('adminstaticword.Status') }}:</label>
                                        <div class="toggler">
                                            <input hidden id="uuuu" type="checkbox" />
                                            <label class="main-toggle toggle-lg" for="uuuu">
                                                <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="status" value="1" id="uuuuu">
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-xs-9"></div>
                                        <button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!--Model close -->

</section>


@section('scripts')

<script>
    (function ($) {
        "use strict";
        tinymce.init({
            selector: 'textarea#detail'
        });
    })(jQuery);
</script>

@endsection