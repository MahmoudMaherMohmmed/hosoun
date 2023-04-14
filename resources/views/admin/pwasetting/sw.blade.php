<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('sw.update') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="swupdate">Service Worker Setting:</label>
                                <textarea id="swupdate" name="swupdate" class="form-control" id="" cols="30" rows="25">{{ $swjs }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-9"></div>
                            <button type="submit" class="btn btn-md col-xs-3 btn-flat btn-primary">{{ __('adminstaticword.Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>