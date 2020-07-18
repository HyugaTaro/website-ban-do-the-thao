<?php 
	require('connection/connection.php');
?>
<?php
if ( isset( $_POST['LuuTT'] ) ) {
    if ( isset( $_SESSION['giohang'] ) ) {
        if ( $_POST['txt_email'] != "" and $_POST['txt_hoten'] != "" and $_POST['txt_dienthoai'] != "" and $_POST['txt_diachinhanhang'] != "" and $_POST['txt_phuongthuctt'] != "" ) {
            $idkh = $_POST['txt_iduser'];
            $email = $_POST['txt_email'];
            $tenkh = $_POST['txt_hoten'];
            $dienthoai = $_POST['txt_dienthoai'];
            $diachinhan = $_POST['txt_diachinhanhang'];
            $phuongthuc = $_POST['txt_phuongthuctt'];
            $ngay = date( 'Y-m-d' );
            if ( isset( $_SESSION['tendn'] ) ) {
                $sql = "INSERT INTO tbl_hoadon(mahd, IDUser, hoten, dienthoai, email, diachi, ngaydathang, trangthai) VALUES 
                (null,'$idkh', '$tenkh', '$dienthoai', '$email', '$diachinhan', '$ngay','1')";
                mysqli_query( $con, $sql );
                $mahd = mysqli_insert_id( $con );
                foreach ($_SESSION['giohang'] as $stt => $cart) {
                        $row_show = mysqli_fetch_row(mysqli_query($con, "SELECT * FROM tbl_dmsp WHERE IDSP in ('$stt')"));
                        $idsp = $row_show[0];
                        $masp = $row_show[1];
                        $tensp = $row_show[2];
                        $gia = $row_show[5];
                        $soluong = $cart;
                        $sql1 = "INSERT INTO tbl_hoadonchitiet(mahd,IDSP,TenSP,soluong,GiaSP,phuongthuctt) VALUES('$mahd','$idsp','$tensp',$soluong,$gia,'$phuongthuc')";
                        mysqli_query($con, $sql1);
                        // update số lượng bán
                        $sql_update_SLBan = "select * from tbl_dmsp where MaSP='$masp'";
                        $rows = mysqli_query($con, $sql_update_SLBan);
                        $rowdm = mysqli_fetch_array($rows);
                        $ban = $rowdm['slDaBan'] + $cart;
                        $sql2 = "UPDATE tbl_dmsp SET slDaBan = $ban WHERE MaSP = '$masp'";
                        mysqli_query($con, $sql2);
                }
            } else {
            }
            unset( $_SESSION['giohang'] );
            echo "
<script language='javascript'>
        alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất');
        window.open('index.php','_self',3);
</script>";
        } else echo "<script>alert('Bạn chưa nhập đầy đủ thông tin khách hàng');</script>";
    } else
    echo "<script>alert('Không lấy được thông tin giỏ hàng');</script>";
}
?>