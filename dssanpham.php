
    	
        <?php
		$conn = mysqli_connect('localhost', 'root', '', 'shopthethao');
		mysqli_set_charset($conn, 'utf8');
		$result = mysqli_query($conn, 'select count(IDSP) as total from tbl_dmsp');
		$row = mysqli_fetch_assoc($result);
		$total_records = $row['total'];
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$limit = 8;
		$total_page = ceil($total_records / $limit);
		if ($current_page > $total_page){
			$current_page = $total_page;
		}
		else if ($current_page < 1){
			$current_page = 1;
		}
		$start = ($current_page - 1) * $limit;
		$result = mysqli_query($conn, "SELECT * FROM tbl_dmsp LIMIT $start, $limit");
		?>
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-12 bg-success">
				<h2  style="font-size:3vw;">Các sản phẩm của shop</h2>
			</div>
		</div>
	</div>
<div class="row">
<?php	
	//session_start();
	require('connection/connection.php');
  	$sql = "select * from tbl_dmsp order by IDSP desc";
  	$query = mysqli_query($con,$sql);
  	if(mysqli_num_rows($query) > 0){
		while($row = mysqli_fetch_assoc($result)){?>
 		<div class="col-md-3 my-3">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-100 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
				<form method="post" action="index.php?action=add&id=<?php echo $row['IDSP'];?>">
				<img class="card-img-top img-reponsive img-thumbnail rounded-circle" id="myImg" src="<?php echo $row['HinhDaiDien'];?>">
				<div class="card-body text-center">
					<?php echo "<h5 class='card-title'>".$row['TenSP']."</h5>";
					echo "<span>Giá: <span class='text-danger'>".number_format($row['DonGia'])."đ</span></span>";echo "</a>";?>
					<div class="card-title">
					<div class="row">
						<div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Số lượng</span>
                            </div>
                            <input type="number" value="1" min="1" max="200" name="quantity" class="form-control">
                            </div>
					</div>
					</div>
				</div>
				<input type="hidden" name="hidden_masp" value="<?php echo $row['MaSP'];?>"/>
				<input type="hidden" name="hidden_image" value="<?php echo $row['HinhDaiDien'];?>"/>
				<input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" />  
                <input type="hidden" name="hidden_price" value="<?php echo $row["DonGia"]; ?>" />
				<div class="text-center">
					<?php
						$tinh = $row['SoLuong'] - $row['slDaBan'];
						if ($tinh > 0) {
							echo "<input type='submit' name='btn_dathang' class='btn btn-outline-success' value='Mua ngay'/>";
							echo "<button class='btn btn-outline-warning ml-2'><a href='./index.php?action=chitiet&id=".$row['IDSP']."'>Chi tiết</a></button>";
						}else{
							echo "<input type='button' class='btn btn-danger' value='Đã hết hàng'/>";
							echo "<button class='btn btn-outline-warning ml-2'><a href='./index.php?action=chitiet&id=".$row['IDSP']."'>Chi tiết</a></button>";
						}
					?>
				</div>
				</form>
				</div>
			</div>
		</div>
        <?php							
		}
	}else
	{
		echo "Không có dữ liệu";
	}

?>
</div>
<nav aria-label="Page navigation example" class="my-3">
    <ul class="pagination justify-content-center">
        <?php
		if ($current_page > 1 && $total_page > 1){
		echo '<li class="page-item"><a class="page-link" href="index.php?page='.($current_page-1).'">Trang trước</a></li>';
		}
		for ($i = 1; $i <= $total_page; $i++){
		if ($i == $current_page){
			echo '<li class="page-item"><a class="page-link">'.$i.'</a></li>';
		}
		else{
			echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
		}
		}
		if ($current_page < $total_page && $total_page > 1){
			echo '<li class="page-item"><a class="page-link" href="index.php?page='.($current_page+1).'">Trang sau</a></li>';
		}
		?>
    </ul>
</nav>
