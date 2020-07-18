<form action="index.php" method="POST">
        <!-- The Modal -->
        <div class="modal fade" id="myModalsignup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Đăng ký tài khoản</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Tài khoản</label>
                            <input type="text" class="form-control" id="Username" name="txt_tendn" placeholder="Nhập tài khoản">
                            <p class="usernameError"></p>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="txt_pass" placeholder="Nhập mật khẩu">
                            <p class="passwordError"></p>
                        </div>
                        <div class="form-group">
                            <label for="tensd">Họ và tên</label>
                            <input type="text" class="form-control" id="tensd" name="txt_tensd" placeholder="Nhập họ và tên">
                            <p class="tensdError"></p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="txt_email" placeholder="Nhập email">
                            <p class="emailError"></p>
                        </div>
                        <div class="form-group">
                            <label for="gioitinh">Giới Tính</label>
                            <select class="form-control" name="txt_gioitinh">
                                <option class="form-control" value="Nam">Nam</option>
                                <option class="form-control" value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sdt">Số điện thoại</label>
                            <input type="text" class="form-control" id="sodienthoai" name="txt_sodienthoai" placeholder="Nhập số điện thoại">
                            <p class="sodienthoaiError"></p>
                        </div>
                        <div class="form-group">
                            <label for="diachi">Địa chỉ</label>
                            <input type="text" class="form-control" id="diachi" name="txt_diachi" placeholder="Nhập địa chỉ">
                            <p class="diachiError"></p>
                        </div>
                        <button type="submit" name="btn_dangky" class="btn btn-success btn-block my-3">Đăng ký</button>
                        <?php
                        require("xuly_signup.php");
                        ?>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
        <?php 
        	require('xuly_login.php');
        ?>
    </form> 