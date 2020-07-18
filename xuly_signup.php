<meta charset="utf-8" />
<?php
	require('connection/connection.php');
	if(isset($_POST['btn_dangky'])){
		$tendn = $_POST['txt_tendn'];
		$pass = md5($_POST['txt_pass']);
		$tensd = $_POST['txt_tensd'];
		$email = $_POST['txt_email'];
		$gioitinh = $_POST['txt_gioitinh'];
		$sdt = $_POST['txt_sodienthoai'];
		$diachi = $_POST['txt_diachi'];
		if ($tendn == ""){
			echo"<script>			
				alert('Vui lòng nhập tài khoản'); 
				window.open('index.php','_self');
			</script>";
		}else if($pass == ""){
			echo"<script>			
				alert('Vui lòng nhập mật khẩu'); 
				window.open('index.php','_self');
			</script>";
		}else if($tensd == ""){
			echo"<script>			
				alert('Vui lòng nhập họ và tên'); 
				window.open('index.php','_self');
			</script>";
		}else if($email == ""){
			echo"<script>			
				alert('Vui lòng nhập email'); 
				window.open('index.php','_self');
			</script>";
		}else if($sdt == ""){
			echo"<script>			
				alert('Vui lòng nhập số điện thoại'); 
				window.open('index.php','_self');
			</script>";
		}else if($diachi == ""){
			echo"<script>			
				alert('Vui lòng nhập địa chỉ'); 
				window.open('index.php','_self');
			</script>";
		}else{
			$sql_kt = "select IDUser from tbl_user where UserName = '$tendn'";
            $result_kt = mysqli_query($con, $sql_kt);
            $num_rows = mysqli_num_rows($result_kt);
            if($num_rows){
                echo "<script>alert('Đã tồn tại Tài khoản này, vui lòng nhập một Tài khoản mới!');
                window.open('index.php','_self');</script>";
            }else{
            $sql_ktemail = "SELECT Email FROM tbl_user WHERE Email='$email'";
            $result_ktemail = mysqli_query($con, $sql_ktemail);
            $num_rows = mysqli_num_rows($result_ktemail);
            if($num_rows){
                echo "<script>alert('Email này đã có người dùng, vui lòng nhập một Email khác!');
                window.open('index.php','_self');</script>";
            }
            else{
                $sql_insert = "INSERT INTO tbl_user (IDUser, UserName, PassWord, TenNguoiSuDung, Email,GioiTinh, DienThoai, DiaChi) VALUES (NULL,'$tendn','$pass','$tensd','$email','$gioitinh','$sdt','$diachi')";
                $result_insert = mysqli_query($con, $sql_insert);
                // $num_rows_insert = mysqli_num_rows($result_insert);
                if($result_insert){
                    echo "<script>
                        alert('Đã đăng ký thành công! Hãy đăng nhập để tiếp tục!');
                        window.open('index.php?','_self');
                    </script>";
				}
			}
            }
		}
	}
?>