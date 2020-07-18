
<?php 
if (isset($_POST['btn_doimk'])) {
	if (isset($_SESSION['tendn']) != NULL) {
		require('connection/connection.php');
		$sql_mk = "select * from tbl_user where UserName='".$_SESSION['tendn']."'";
    	$row_pass = mysqli_query($con,$sql_mk);
    	$nhap = mysqli_fetch_array($row_pass);
    	$passcu = md5($_POST['txt_passcu']);
    	$passmoi = md5($_POST['txt_passmoi']);
    	$nhappassmoi = md5($_POST['txt_nhaplaipassmoi']);
    	if($passcu != $nhap['PassWord']){
    		echo "<script>alert('Mật khẩu cũ không đúng, Vui lòng kiểm tra đã tắt Caplock!');</script>";
    	}else if (strlen($passmoi)<5){
    		echo "<script>alert('Mật khẩu quá ngắn, Vui lòng nhập tối thiểu 6 kí tự!');</script>";
    	}else if ($passmoi != $nhappassmoi){
    		echo "<script>alert('Mật khẩu mới không đúng, Vui lòng kiểm tra lại!');</script>";
    	}else{
    	$sql_doimk = "UPDATE tbl_user SET PassWord = '$passmoi' WHERE IDUser = '".$nhap['IDUser']."'";
		$row_mk = mysqli_query($con,$sql_doimk);
		echo "<script>alert('Đổi mật khẩu thành công!');</script>";
        }
	}
}
?>
