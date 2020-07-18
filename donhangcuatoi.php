
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-responsive-md" cellspacing="0">
        <thead>
            <tr class="bg-info">
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th>Xem</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include'connection/connection.php';
            $user = $_SESSION['tendn'];
            $sql_user = "SELECT * from tbl_user WHERE UserName = '$user' ";
            $query = mysqli_query($con,$sql_user);
            $rs = mysqli_fetch_array($query);
            $sql_table_dh = "SELECT * FROM tbl_hoadon WHERE IDUser = '".$rs['IDUser']."' order by mahd ASC";
            $kq = mysqli_query($con, $sql_table_dh);
            $i = 1;
            while ($row = mysqli_fetch_assoc($kq)) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['hoten']; ?></td>
                    <td><?php echo $row['ngaydathang']; ?></td>
                    <?php
                        if ($row['trangthai'] == 1) {
                            $hienthi = '<img class="img-fluid" src="Admin/image/iconchamxanh.png" width="15" height="15"/>Mới';
                        } else if ($row['trangthai'] == 2) {
                            $hienthi = '<img class="img-fluid" src="Admin/image/iconchambac.png" width="15" height="15"/>Đang gửi hàng';
                        }else if ($row['trangthai'] == 3) {
                            $hienthi = '<img class="img-fluid" src="Admin/image/iconchambac.png" width="15" height="15"/>Đang giao hàng';
                        }else if ($row['trangthai'] == 4) {
                            $hienthi = '<img class="img-fluid" src="Admin/image/iconchambac.png" width="15" height="15"/>Đã giao hàng';
                        }else if ($row['trangthai'] == 5) {
                            $hienthi = '<img class="img-fluid" src="Admin/image/iconchamxanh.png" width="15" height="15"/>Hoàn tất';
                        }else{
                            $hienthi = '<img class="img-fluid" src="Admin/image/iconchamdo.png" width="15" height="15"/>Hủy';
                        }
                        ?>
                    <td><?php echo $hienthi ?></td>
            <td><a href="index.php?action=chitietdh&mahd=<?php echo $row['mahd'];?>"><i class="fab fa-android mx-2"></i>Chi tiết</a></td>
                </tr>
            <?php
            $i++;
            }
            ?>
        </tbody>
    </table>
    </div>
