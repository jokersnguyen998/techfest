<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Chỉnh sửa tài khoản</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="submit" action="{{ route('admin.users.update', $user) }}" method="POST">
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>First Name <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ $user->firstname }}">
                            <p id="firstname"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Last Name <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ $user->lastname }}">
                            <p id="lastname"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username <i class="text-muted">(*)</i></label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}">
                            <p id="username"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password <i class="text-muted">(*)</i></label>
                            <input type="password" class="form-control" name="password" placeholder="********">
                            <p id="password"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password Confirm <i class="text-muted">(*)</i></label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="********">
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