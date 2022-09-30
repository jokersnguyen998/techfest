<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Chỉnh sửa diễn giả</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="submit" action="{{ route('admin.speakers.update', [$submit, $speaker]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên diễn giả <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="name" placeholder="Tên diễn giả" value="{{ $speaker->name }}">
                            <p id="name"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Giới tính <i class="text-muted">(*)</i></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="sex1" value="1" {{ $speaker->getAttributes()['sex'] == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="sex1">Nam</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="sex2" value="0" {{ $speaker->getAttributes()['sex'] == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="sex2">Nữ</label>
                            </div>
                            <p id="sex"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nơi làm việc <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="work_place" placeholder="Nơi làm việc" value="{{ $speaker->work_place }}">
                            <p id="work_place"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên bài tham luận <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="discussion_name" placeholder="Tên bài tham luận" value="{{ $speaker->discussion_name }}">
                            <p id="discussion_name"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hình đại diện <i class="text-muted">(*)</i></label>
                            <input id="filePhoto" type="file" class="form-control-file" name="avatar">
                            <p id="avatar"></p>
                        </div>
                        <div class="mb-2">
                            <img id="previewImage" src="{{ $speaker->avatar }}" alt="your image" class="w-100" />
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