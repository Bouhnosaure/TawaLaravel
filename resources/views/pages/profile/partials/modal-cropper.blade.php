<div class="modal fade" id="cropper-modal_{{$type}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="cropper-wrapper" id="cropper-wrapper_{{$type}}">
                    <img src="" alt="Picture">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" type="reset" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" type="submit" id="cropper-submit_{{$type}}">Save changes</button>
            </div>
        </div>
    </div>
</div>