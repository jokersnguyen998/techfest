<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">{{ $submit->name }}</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center"><strong>Khung chương trình</strong></h5>
                    {!! $submit->schedule !!}
                </div>
            </div>
        </div>
    </div>
</div>