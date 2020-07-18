<?php 
	include'connection/connection.php';
	if (isset($_POST['btn_huydonhang'])) {
		$madh = $_POST['txt_madh'];
		$lidohuy = $_POST['txt_lido'];
		$sql_updatedh = "UPDATE tbl_hoadon SET trangthai = 6, lidohuy = '$lidohuy' WHERE mahd = '$mahd' ";
		$qr = mysqli_query($con,$sql_updatedh);
		if ($qr > 0) {
			echo '<script>alert("Đã hủy thành công đơn hàng!")</script>';
		  echo '<script>window.location="index.php?action=donhangkh"</script>';
		}else{
			echo "Hủy thất bại!";
		}
	}
?>