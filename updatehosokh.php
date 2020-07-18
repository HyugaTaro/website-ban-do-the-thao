<?php 
	include'connection/connection.php';
	if (isset($_POST['btn_updatehskh'])) {
		$iduser = $_POST['txt_iduser'];
		$hovatenkh = $_POST['txt_hotenkh'];
		$emailkh = $_POST['txt_emailkh'];
		$gioitinhkh = $_POST['txt_gioitinhkh'];
		$dienthoaikh = $_POST['txt_dienthoaikh'];
		$diachikh = $_POST['txt_diachikh'];
		$sql_updatehs = "UPDATE tbl_user SET TenNguoiSuDung ='$hovatenkh',Email = '$emailkh',GioiTinh = '$gioitinhkh',DienThoai = '$dienthoaikh',DiaChi = '$diachikh' WHERE IDUser = '$iduser'";
		$query_hskh = mysqli_query($con,$sql_updatehs);
		if ($query_hskh>0) {
			echo"<script>
			alert('Đã cập nhật hồ sơ của quý khách!');
			window.location='index.php?action=hosokh';
			</script>";
		}else{
			echo"<script>alert('Cập nhật hồ sơ thất bại!');</script>";
		}
	}
?>