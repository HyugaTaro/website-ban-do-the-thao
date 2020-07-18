<?php 
	require('connection/connection.php');
	if(isset($_POST['btn_themlh'])){
	if($_POST['hovaten']!="" and $_POST['email'] !="" and $_POST['diachi'] !="" and $_POST['noidung'] !="")
	{
		$hovaten = $_POST['hovaten'];
		$email = $_POST['email'];
		$diachi = $_POST['diachi'];
		$noidung = $_POST['noidung'];
		$sql = "INSERT INTO tbl_phanhoi (IDThu,HoVaTen,Email,DiaChi,NoiDung) values(null,'$hovaten','$email','$diachi','$noidung')";
		$kq = mysqli_query($con,$sql);		
		echo "<script>
                        alert('Đã gửi thành công: $hovaten. Chúng tôi sẽ liên hệ bạn sớm nhất!');
                        window.open('index.php?action=lienhe&IDThu','_self');
                        </script>";
	}else{
		echo '<script>alert("Vui lòng nhập đầy đủ thông tin!")</script>';
		  echo '<script>window.location="index.php?action=lienhe"</script>';
	}
}
?>
