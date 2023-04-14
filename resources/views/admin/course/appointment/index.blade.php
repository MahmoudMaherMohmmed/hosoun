<section class="content">

    <div class="row">
        <div class="col-xs-12">

            <br>
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('adminstaticword.User') }}</th>
                            <th>{{ __('adminstaticword.Course') }}</th>
                            <th>{{ __('adminstaticword.Instructor') }}</th>
                            <th>{{ __('adminstaticword.Title') }}</th>
                            <th>{{ __('adminstaticword.Accepted') }}</th>
                            <th>{{ __('adminstaticword.View') }}</th>
                            <th>{{ __('adminstaticword.Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @foreach($appointment as $appoint)
                        <tr>
                            <?php $i++;?>
                            <td><?php echo $i;?></td>
                            <td>@if(isset($appoint->user)) {{$appoint->user->fname}} @endif</td>
                            <td>@if(isset($appoint->courses)) {{$appoint->courses->title}} @endif</td>
                            <td>@if(isset($appoint->instructor)) {{$appoint->instructor->fname}} @endif</td>
                            <td>{{ $appoint->title }}</td>
                            <td>
                                @if($appoint->accept==1)
                                <span class="table-status status-approved">
                                    {{ __('adminstaticword.Yes') }}
                                </span>
                                @else
                                <span class="table-status status-rejected">
                                    {{ __('adminstaticword.No') }}
                                </span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm"
                                    href="{{url('appointment/'.$appoint->id)}}">{{ __('adminstaticword.View') }}</a>
                            </td>

                            <td>
                                <form method="post" action="{{url('appointment/'.$appoint->id)}}" ata-parsley-validate
                                    class="form-horizontal form-label-left">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn-null table-delete"><i
                                            class='bx bx-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</section>