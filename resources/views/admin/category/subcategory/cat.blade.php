@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="modal fade" id="myModal9" z-index="1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.AddCategory') }}</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('cat.store') }}" method="POST">
                    {{ csrf_field() }}



                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="category">{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
                                <input id="category" required placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.CategoryName') }}" type="text" class="form-control" name="category">
                            </div>
                            </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="chooseIcon">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                                <input id="chooseIcon" type="text" class="form-control icp-auto icp" name="icon" required placeholder="{{ __('adminstaticword.ChooseIcon') }}">
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>{{ __('adminstaticword.Status') }}:</label>
                                <div class="toggler">
                                    <input hidden id="c1001" type="checkbox" />
                                    <label class="main-toggle toggle-lg" for="c1001">
                                        <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="status" value="0" id="t1001">
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
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
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-9"></div>
                        <div class="col-xs-3">
                            <input type="submit" value="{{ __('adminstaticword.Save') }}" class="btn btn-md btn-primary col-xs-12">
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div>