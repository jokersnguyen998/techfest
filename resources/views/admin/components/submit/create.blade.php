<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Thêm hội thảo</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="submit" action="{{ route('admin.submits.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Loại <i class="text-muted">(*)</i></label>
                            <select class="form-control" name="type">
                                <option value="Hội thảo">Hội thảo</option>
                                <option value="Tọa đàm">Tọa đàm</option>
                            </select>
                            <p id="type"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên hội thảo <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="name" placeholder="Tên hội thảo">
                            <p id="name"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ngày tổ chức <i class="text-muted">(*)</i></label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text" name="time_start" class="form-control datetimepicker-input"
                                    data-target="#reservationdatetime"
                                    value="{{ \Carbon\Carbon::now()->format('H:i:s d/m/Y') }}" />
                                <div class="input-group-append" data-target="#reservationdatetime"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <p id="time_start"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Địa điểm tổ chức <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="location" placeholder="Địa điểm tổ chức">
                            <p id="location"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Chủ đề <i class="text-muted">(*)</i></label>
                            <textarea id="my-editor" name="topic" class="form-control my-editor"></textarea>
                            <p id="topic"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Khung chương trình <i class="text-muted">(*)</i></label>
                            <input type="file" class="form-control-file" name="schedule">
                            <p id="schedule"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Hiển thị</label>
                            <input type="checkbox" name="active" value="1" placeholder="Địa điểm tổ chức">
                            <p id="active"></p>
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
