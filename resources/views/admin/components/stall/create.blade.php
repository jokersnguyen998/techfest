<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Thêm gian hàng</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="submit" action="{{ route('admin.stalls.store') }}" method="POST">
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên gian hàng <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="name" placeholder="Tên gian hàng">
                            <p id="name"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả ngắn <i class="text-muted">(*)</i></label>
                            <textarea name="description" class="form-control" placeholder="Mô tả ngắn về đơn vị trưng bày"></textarea>
                            <p id="description"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Trang liên hệ</label>
                            <input type="text" class="form-control" name="contact"
                                placeholder="Trang liên hệ của đơn vị">
                            <p id="contact"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Thứ tự gian hàng</label>
                            <input type="number" min="0" class="form-control" name="position">
                            <p id="position"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Logo đơn vị trưng bày <i class="text-muted">(*)</i></label>
                            <input id="fileLogo" type="file" class="form-control-file" name="logo">
                            <p id="logo"></p>
                        </div>
                        <div class="mb-2" style="display: none;">
                            <img id="previewLogo" src="#" alt="your image" class="w-50 h-50" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Standy <i class="text-muted">(*)</i></label>
                            <input id="fileStandy" type="file" class="form-control-file" name="standy">
                            <p id="standy"></p>
                        </div>
                        <div class="mb-2" style="display: none;">
                            <img id="previewStandy" src="#" alt="your image" class="w-50" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Video gian hàng <i class="text-muted">(*)</i></label>
                            <input id="fileVideo" type="file" class="form-control-file" name="video_path">
                            <p id="video_path"></p>
                        </div>
                        <div class="mb-2" style="display: none;">
                            <video id="previewVideo" src="" class="w-100" controls></video>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hình chi tiết <i class="text-muted">(*)</i></label>
                            <input type="file" class="form-control-file filePhotos" name="images[]" multiple>
                            <p id="images"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hình gian hàng</label>
                            <input id="filePhoto" type="file" class="form-control-file" name="stall_image_path">
                            <p id="stall_image_path"></p>
                        </div>
                        <div class="mb-2" style="display: none;">
                            <img id="previewImage" src="#" alt="your image" class="w-50 h-50" />
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
