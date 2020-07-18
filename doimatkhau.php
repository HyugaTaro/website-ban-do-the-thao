
<form action="" method="POST" >
        <!-- The Modal -->
        <div class="modal fade" id="myModaldoimk">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Đổi mật khẩu</h4>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="taikhoan">Mật khẩu cũ</label>
                            <input type="password" class="form-control"  name="txt_passcu" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu mới</label>
                            <input type="password" class="form-control"  name="txt_passmoi" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password">Nhập lại mật khẩu mới</label>
                            <input type="password" class="form-control"  name="txt_nhaplaipassmoi" placeholder="">
                        </div>
                        <button type="submit"  name="btn_doimk" class="btn btn-success btn-block my-3">Thay đổi</button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
        <?php 
            require('xuly_doimatkhau.php');
        ?>
    </form>