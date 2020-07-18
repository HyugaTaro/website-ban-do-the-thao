<?php include'chuyendoitien.php'; ?>
<?php 
	if (isset($_SESSION['tendn']) && $_SESSION['tendn']) {
	require('connection/connection.php');
	$sql_1 = "select * from tbl_user where UserName = '".$_SESSION['tendn']."'";
	$row_1 = mysqli_query($con,$sql_1);
	$count = mysqli_num_rows($row_1);
	if($count>0){
		$nhapkh = mysqli_fetch_array($row_1);
	}
?>
<button class="btn btn-danger"><a class="text-white" href="index.php?action=giohang"><span style="transform: rotate(180deg);" class="fas fa-play mx-2"></span>Trở lại</a></button>
    <hr class="bg-light">
<form method="POST">
<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-12 col-md-5 col-lg-5 col-xs-5">
				<h4 class="text-center">THÔNG TIN GIAO HÀNG</h4>
				<input type="hidden" name="txt_iduser" value="<?php echo $nhapkh['IDUser']; ?>"/>
				<p>Nhập địa chỉ email:
				<input class="form-control" placeholder="nhập email..." type="text" name="txt_email" /></p>
				<p>Nhập họ và tên:
				<input class="form-control" placeholder="nhập họ tên..." type="text" name="txt_hoten"/></p>
				<p>Nhập số điện thoại:
				<input class="form-control" placeholder="nhập số điện thoại..." type="text" name="txt_dienthoai"/></p>
				<p>Nhập địa chỉ nhận hàng:
				<input class="form-control" placeholder="nhập địa chỉ..." type="text" name="txt_diachinhanhang"/></p>
				<select name="txt_phuongthuctt" class="form-control">
                        <option>Chọn phương thức thanh toán</option>
                        <option value="1">Qua bưu điện</option>
                        <option value="2">Qua ví momo</option>
                        <option value="3">Thanh toán trực tiếp</option>
                </select>
            <div class="text-center">
				<button class="btn btn-danger my-2" type="submit" name="LuuTT"><span>Thanh toán khi nhận hàng</span><br><span>Thanh toán C.O.D</span></button>
			</div>
		</div>
		<div class="col-12 col-md-7 col-lg-7 col-xs-7">
				<?php
					if (!empty($_SESSION["giohang"])) {
						$tong = 0; $thanhtien = 0; ?>
						<h4 class="text-center">THÔNG TIN ĐƠN HÀNG</h4>
						<table class="table table-bordered">
							<thead>
							<tr class="table-secondary">  
		                 		<th scope="col">Tên sản phẩm</th>  
		                 		<th scope="col">Số lượng</th>
		                 		<th scope="col">Giá</th>
		                 		<th scope="col">Thành tiền</th>  
		            		</tr>
		            		</thead> 
						<?php
						foreach($_SESSION["giohang"] as $keys => $values)
						{
							$row_show = mysqli_fetch_row( mysqli_query( $con, "SELECT * FROM tbl_dmsp WHERE IDSP in ('$keys')" ) );
							$thanhtien = $values * $row_show[5];
							$tong = $tong + ($values * $row_show[5]); ?>
							<tr>
		            			<td><?php echo $row_show[2]; ?></td>
		            			<td><?php echo $values; ?></td>
		            			<td><?php echo number_format($row_show[5], 0, ",", "."); ?></td>
		            			<td><?php echo number_format($thanhtien);?> VNĐ</td>
		            		</tr>
		  
		            	<?php
						}
						?>
							<tr>
		            			<td colspan="3" class="font-weight-bold">Tổng tiền</td>
		            			<td class="font-weight-bold"><?php echo number_format($tong); ?> VNĐ</td>
		            		</tr>
		            		<tr>
		            			<td colspan="4">Tổng tiền bằng chữ: <?php echo '<b>'.convert_number_to_words($tong).'</b>'?></td>
		            		</tr>
						</table>
				<?php
					}else{
							echo "Không lấy được dữ liệu";
						}
				?>
				
				<?php
					require('insert.php');
				?>
		</div>	
	</div>	
</div>
</form>
<?php
	}else{?>
		Đăng nhập để tiếp tục
		<a data-toggle="modal" data-target="#myModal"><button type="submit" class="btn btn-primary btn-block">Đăng nhập</button></a>
		<?php
	}
?>