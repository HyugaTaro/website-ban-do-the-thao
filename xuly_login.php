<meta charset="utf-8" />
<?php
	require('connection/connection.php');
	if(isset($_POST['btn_dangnhap'])){
		$tendn = $_POST['txt_tendn'];
		$pass = md5($_POST['txt_pass']);
		$tendn = strip_tags($tendn);
		$tendn = addslashes($tendn);
		$pass = strip_tags($pass);
		$pass = addslashes($pass);
		if ($tendn == "") {
			echo"<script>			
				alert('Vui lòng nhập Tài khoản và Mật khẩu');
				window.open('index.php','_self'); 
			</script>";
		}
		else{
			$sql = "select * from tbl_user where UserName = '$tendn' and PassWord = '$pass'";
			$query = mysqli_query($con,$sql);
			$row = mysqli_num_rows($query);
			if ($row==0) {
				echo "<script>
				alert('Tên đăng nhập hoặc Mật khẩu không đúng');
				window.open('index.php','_self');
				</script>";
			}else{
				$_SESSION['tendn'] = $tendn;
				// header('location: index.php');
				echo "<script>window.open('index.php','_self');</script>";
			}
		}
	}
?>
