<div class="modal fade" id="{{ isset($idModal) ? $idModal : 'modal-default'}}">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header"> --}}
            {{-- <h4 class="modal-title">{{ isset($title) ? $title : 'Hello'}}</h4> --}}
            {{-- </div> --}}
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
                <p>{{ isset($content) ? $content : ''}}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" id="{{ $idSubmit ? $idSubmit : '' }}" >{{ isset($btnName) ? $btnName : __('layouts.btn_ok') }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('layouts.btn_cancel') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
