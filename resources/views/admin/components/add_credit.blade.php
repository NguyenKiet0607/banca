<div class="modal fade" id="modal-add-credit">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title">{{ __('layouts.add_credit') }}</h4>
             </div>
            <div class="modal-body">
                <form action="{{ route('admin.credit.add') }}" id="form-add-credit" method="POST">
                    <div class="form-group">
                        @csrf
                        <input name="id" id="id-in-modal" value="" hidden="">
                        <input name="model" id="model-in-modal" value="" hidden="">
                        <input name="credit" class="form-control" type="number">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" id="btn-add-credit" >{{ __('layouts.add_credit') }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('layouts.btn_cancel') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
