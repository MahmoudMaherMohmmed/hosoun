@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="modal fade" id="myModal7" z-index="1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.AddSubCategory') }}</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('child.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="categories">{{ __('adminstaticword.Category') }}</label>
                                <select id="categories" name="categories" class="form-control js-example-basic-single">
                                    @foreach($category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="sub_title">{{ __('adminstaticword.SubCategory') }}:<sup
                                        class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="title" id="sub_title" value="">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="chooseIcon">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control icp-auto icp" name="icon" id="chooseIcon"
                                    placeholder="{{ __('adminstaticword.ChooseIcon') }}" value="">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>{{ __('adminstaticword.Status') }}:</label>
                                <div class="toggler">
                                    <input hidden id="c101" type="checkbox" />
                                    <label class="main-toggle toggle-lg" for="c101">
                                        <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="status" value="0" id="t101">
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-9"></div>
                            <div class="col-xs-3">
                                <button type="submit"
                                    class="btn btn-primary col-xs-12">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.box -->

        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->
</section>