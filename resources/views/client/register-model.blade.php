<div class="model-logout model-logout_active" style="display: none" id="register-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper bg-login">
        <div class="model-title">
            <h1 class="mb-0">ĐĂNG KÝ</h1>
        </div>
        <form id="registerform">
            <div class="form-group">
                <input type="text" class="form-control text-center" placeholder="Tên tài khoản" name="username" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control text-center" placeholder="Số điện thoại" name="phone" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control text-center" placeholder="Mật khẩu" name="password" autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control text-center" placeholder="Xác nhận mật khẩu" name="password_confirmation" autocomplete="off" required="">
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-group code-wrapper">
                        <div class="col-md-6 col-6 pr-0">
                            <input type="text" class="form-control text-center" name="register_code" placeholder="Mã đăng nhập">
                        </div>
                        <div class="col-md-6 col-6">
                            <label class="col-form-label" id="captcha">1234</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group form-group_btn">
                <div class="btn btn-model-cf">Huỷ thao tác</div>
                <button type="submit" class="btn btn-model-cc"> Đăng ký </button>
            </div>
            <div class="q-register">
                Đã có tài khoản? <span class="btn-login">Đăng nhập</span>
            </div>
        </form>
    </div>
</div>