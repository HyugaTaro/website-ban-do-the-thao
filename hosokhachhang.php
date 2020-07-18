<?php 
	require('connection/connection.php');
	$user = isset($_SESSION['tendn']);
	$sql_hosokh = "SELECT * FROM tbl_user Where UserName = '".$_SESSION['tendn']."'";
	$row_hosokh = mysqli_query($con,$sql_hosokh);
	$hienthi = mysqli_fetch_array($row_hosokh);
?>
<div class="container-fluid padding">
	<div class="col-12">
		<h2 class="text-danger text-center">HỒ SƠ CÁ NHÂN CỦA TÔI</h2>
		<div class="text-center">
			<img class="img-responsive my-2" src="images/Icon/avatarnam.png" width="150" height="100%" />
		</div>
		<form method="POST">
			<input type="hidden" name="txt_iduser" value="<?php echo $hienthi['IDUser']; ?>"/>
			<div class="form-group row">
		    	<label class="col-sm-2 col-form-label font-italic">Họ và tên</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="txt_hotenkh" value="<?php echo $hienthi['TenNguoiSuDung']; ?>">
			    </div>
		  	</div>
		  	<div class="form-group row">
		    	<label class="col-sm-2 col-form-label font-italic">Email</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="txt_emailkh" value="<?php echo $hienthi['Email']; ?>">
			    </div>
		  	</div>
		  	<div class="form-group row">
		    	<label class="col-sm-2 col-form-label font-italic">Giới tính</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="txt_gioitinhkh" value="<?php echo $hienthi['GioiTinh']; ?>">
			    </div>
		  	</div>
			<div class="form-group row">
		    	<label class="col-sm-2 col-form-label font-italic">Số điện thoại</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="txt_dienthoaikh" value="<?php echo $hienthi['DienThoai']; ?>">
			    </div>
		  	</div>
		  	<div class="form-group row">
		    	<label class="col-sm-2 col-form-label font-italic">Địa chỉ</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="txt_diachikh" value="<?php echo $hienthi['DiaChi']; ?>">
			    </div>
		  	</div>
		  	<div class="text-center">
		  	<button class="btn btn-danger" name="btn_updatehskh">Cập nhật hồ sơ</button>
		  	<?php require('updatehosokh.php'); ?>
		  	</div>
		</form>
	</div>
</div>