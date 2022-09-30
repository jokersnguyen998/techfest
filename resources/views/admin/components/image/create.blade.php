<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Thêm hình ảnh</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="submit" action="{{ route('admin.images.store', [$stall]) }}" method="POST">
                @csrf    
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Vị trí hiển thị <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="position" placeholder="Vị trí gian hàng">
                            <p id="position"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hình chi tiết <i class="text-muted">(*)</i></label>
                            <input id="filePhoto" type="file" class="form-control-file" name="file_path">
                            <p id="file_path"></p>
                        </div>
                        <div class="mb-2" style="display: none;">
                            <img id="previewImage" src="#" alt="your image" class="w-100" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Liên kết</label>
                            <input type="text" class="form-control" name="link" placeholder="Liên kết">
                            <p id="link"></p>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button id="add-submit-btn" type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>