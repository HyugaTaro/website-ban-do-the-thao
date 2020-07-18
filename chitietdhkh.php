<?php include'chuyendoitien.php'; ?>
<div class="row">
    <?php
    require('connection/connection.php');
    $mahd = $_GET['mahd'];
    $sql = mysqli_query($con, "SELECT * FROM tbl_hoadonchitiet WHERE mahd = '$mahd'");
    $result = mysqli_query($con, "SELECT * FROM tbl_hoadon where mahd = '$mahd'");
    $array = mysqli_fetch_array($result);
    ?>
    <div class="col-md-12 col-12">
        <?php 
            if ($array['trangthai'] < 2) {
            ?>
        <button class="btn btn-danger"><a class="text-white" href="index.php?action=donhangkh"><span style="transform: rotate(180deg);" class="fas fa-play mx-2"></span>Trở lại</a></button>
        <button class="btn btn-success"><a data-toggle="modal" data-target="#huydonhang">Hủy đơn hàng</a></button>
            <?php 
            }else{
            ?>
             <button class="btn btn-danger"><a class="text-white" href="index.php?action=donhangkh"><span style="transform: rotate(180deg);" class="fas fa-play mx-2"></span>Trở lại</a></button>
            <button onclick="return alert('Bạn không thể hủy đơn hàng vì đơn hàng của bạn đã được gửi đi!');" class="btn btn-success">Hủy đơn hàng</button>
            <?php
            }
            ?>
        <form method="POST">
        <!-- The Modal -->
        <div class="modal fade" id="huydonhang">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <input type="hidden" name="txt_mahd" value="<?php echo $mahd ?>">
                        <h5 class="modal-title">XÁC NHẬN HỦY ĐƠN HÀNG</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Bạn đang chọn hủy đơn hàng. Vui lòng cho biết lí do để tiếp tục?</label>
                            <select class="form-control" name="txt_lido">
                                <option>Chọn lí do hủy đơn hàng</option>
                                <option value="Người bán không trả lời Chat">Người bán không trả lời Chat</option>
                                <option value="Người bán hủy yêu cầu">Người bán hủy yêu cầu</option>
                                <option value="Thay đổi đơn hàng (màu sắc, kích thước, địa chỉ, thêm mã giảm giá,...)">Thay đổi đơn hàng (màu sắc, kích thước, địa chỉ, thêm mã giảm giá,...)</option>
                                <option value="Có những bình luận không tốt về sản phẩm (không chính hãng, không như mô tả,...)">Có những bình luận không tốt về sản phẩm (không chính hãng, không như mô tả,...)</option>
                                <option value="Thời gian giao hàng quá lâu">Thời gian giao hàng quá lâu</option>
                                <option value="Người bán không đáng tin tưởng">Người bán không đáng tin tưởng</option>
                                <option value="Khác (Đổi ý, tìm được giá rẻ hơn,...)">Khác (Đổi ý, tìm được giá rẻ hơn,...)</option>
                            </select>
                        </div>
                        <div class="row mx-2 my-2">
                            <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Bỏ qua</button>
                            <button onclick="return confirm('Đơn hàng của bạn sẽ được hủy ngay lập tức. Bạn có muốn hủy đơn hàng này?');" type="submit" name="btn_huydonhang" class="btn btn-info">Hủy đơn hàng</button>
                            <?php include 'xuly_huydonhang.php'; ?>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </form>
        <hr>
        <p>Đơn hàng #<mark class="bg-warning"><?php echo $array['mahd']; ?></mark> đã được đặt lúc #<mark class="bg-warning"><?php echo $array['ngaydathang']; ?></mark> và hiện tại là #<mark class="bg-warning"><?php
                if ($array['trangthai'] == 1) {
                    echo "Mới";
                } else if ($array['trangthai'] == 2){
                    echo "Đang gửi hàng";
                }else if ($array['trangthai'] == 3){
                    echo "Đang giao hàng";
                }else if ($array['trangthai'] == 4){
                    echo "Đã giao hàng";
                }else if ($array['trangthai'] == 5){
                    echo "Hoàn tất";
                }else{
                    echo "Đơn hàng bị hủy";
                } ?> (<?php echo $array['lidohuy']; ?>)</mark>
        </p>
        <p>Số điện thoại: <?php echo $array['dienthoai']; ?></p>
        <p>Email: <?php echo $array['email']; ?></p>
        <h3 class="font-weight-bold text-center">CHI TIẾT ĐƠN HÀNG</h3>
        <table class="mb-3 table table-bordered table-hover">
            <tr class="bg-info">
                <button class="btn btn-primary btn-block" type="button" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  <span>SẢN PHẨM</span>
                </button>
            </tr>
            <tr>
                <th class="p-2 text-center">STT</th>
                <th class="p-2 text-center">Tên sản phẩm</th>
                <th class="p-2 text-center">Số lượng</th>
                <th class="p-2 text-center">Giá</th>
                <th class="p-2 text-center">Phương thức thanh toán</th>
            </tr>
            <?php
            if ($sql) {
                $i = 1;
                $tongsotien = 0;
                while ($row = mysqli_fetch_array($sql)) {
                    $tongsotien += $row['soluong']*$row['GiaSP'];
                    ?>
                    <tr>
                        <td class="p-2 text-center"><?php echo $i; ?></td>
                        <td class="p-2 text-center"><?php echo $row['TenSP']; ?></td>
                        <td class="p-2 text-center"><?php echo $row['soluong']; ?></td>
                        <td class="p-2 text-center"><?php echo number_format($row['GiaSP'], 0, ",", "."); ?>đ</td>
                        <td class="p-2 text-center"><?php if ($row['phuongthuctt'] == 1) {
                                                                echo "Thanh toán Qua bưu điện";
                                                            } else if ($row['phuongthuctt'] == 2) {
                                                                echo "Thanh toán Qua ví momo";
                                                            } else {
                                                                echo "Thanh toán trực tiếp khi nhận hàng";
                                                            }
                                                            ?> 
                        </td>
                    </tr>
            <?php 
            $i++;
            }
            } else {
                echo "Không tìm thấy đơn hàng nào";
            } ?>
            <tr>
              <td colspan="4"><b>Tổng cộng tiền thanh toán</b></td>
              <td class="p-2 text-center"><b><?php echo number_format(($tongsotien),0,",",".")?>đ</b></td> 
            </tr>
            <tr>
              <td colspan="5" class="text-center bg-light"><i>Tổng tiền bằng chữ: <?php echo '<b>'.convert_number_to_words($tongsotien).'</b>'?></i></td>
            </tr>
        </table>
        <h3>ĐỊA CHỈ THANH TOÁN</h3>
        <p><?php echo $array['diachi']; ?></p>
    </div>
</div>
