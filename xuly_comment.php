<?php 
	require('connection/connection.php');
	if (isset($_POST['btn_gui'])) {
		if (isset($_SESSION['tendn'])) {
			$sql_kh = "select kh.IDUser from tbl_comment cmt, tbl_user kh where (kh.IDUser = cmt.IDUser) and UserName = '".$_SESSION['tendn']."'";
			$mysql_query = mysqli_query($con,$sql_kh);
			$row_kh = mysqli_fetch_array($mysql_query);
			$noidung = $_POST['txt_noidung'];
			$ngay = date('Y-m-d');
			$sql_insert = "INSERT INTO `tbl_comment` (`IDComment`, `IDUser`, `IDSP`, `NoiDung`, `date`, `Trangthai`) VALUES (NULL, '".$row_kh['IDUser']."', '".$id."', '".$noidung."', '".$ngay."', '1');";
			if (mysqli_query($con,$sql_insert)) {
				echo "<script>alert('Cảm ơn bạn đã comment. Chúng tôi sẽ sớm phê duyệt comment của bạn một cách nhanh nhất!');</script>";
				echo '<script>window.location="index.php"</script>';
			}
		}else{
			echo "Đăng nhập để bình luận";
		}
	}
?>
