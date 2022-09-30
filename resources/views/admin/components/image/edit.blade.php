<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Chỉnh sửa vị trí</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="submit" action="{{ route('admin.images.update', [$stall, $image]) }}" method="POST">
                @csrf    
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Vị trí hiển thị <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="position" placeholder="Vị trí gian hàng" value="{{ $image->position }}">
                            <p id="position"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hình chi tiết <i class="text-muted">(*)</i></label>
                            <input id="filePhoto" type="file" class="form-control-file" name="file_path">
                            <p id="file_path"></p>
                        </div>
                        <div class="mb-2">
                            <img id="previewImage" src="{{ $image->file_path }}" alt="your image" class="w-100" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Liên kết</label>
                            <input type="text" class="form-control" name="link" placeholder="Liên kết" value="{{ $image->link }}">
                            <p id="link"></p>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button id="edit-submit-btn" type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>