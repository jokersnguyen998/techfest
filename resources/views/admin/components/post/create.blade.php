<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Thêm bài viết</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="submit" action="{{ route('admin.posts.store', [$stall]) }}" method="POST">
                @csrf    
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tiêu đề bài viết <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="title" placeholder="Tiêu đề bài viết">
                            <p id="title"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung <i class="text-muted">(*)</i></label>
                            <textarea id="my-editor" name="content" class="form-control my-editor"></textarea>
                            <p id="content"></p>
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