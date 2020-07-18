<meta charset="UTF-8"/>
<div class="row padding">
<?php
    // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_POST['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo '<script>alert("Bạn chưa nhập dữ liệu!")</script>';
                echo '<script>window.location="index.php"</script>';
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from tbl_dmsp where TenSP like '%$search%'";
 
                // Kết nối sql
                $conn = mysqli_connect("localhost", "root", "", "shopthethao");
                mysqli_set_charset($conn, 'utf8');
                // Thực thi câu truy vấn
                $sql = mysqli_query($conn,$query);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    // echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
 					$message = "$num ket qua tra ve voi tu khoa $search";
					echo "<script type='text/javascript'>alert('$message');</script>";
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysqli_fetch_assoc($sql)) {
							?> 
                            <div class="col-md-3 my-3">
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-100 position-relative">
								    <div class="col p-4 d-flex flex-column position-static">
									<form method="post" action="index.php?action=add&id=<?php echo $row['IDSP'];?>">
									<img class="card-img-top img-reponsive img-thumbnail rounded-circle" src="<?php echo $row['HinhDaiDien'];?>">
									<div class="card-body text-center">
										<?php echo "<h4 class='card-title'>".$row['TenSP']."</h4>";
										echo "<span>Giá: <span class='text-danger'>".number_format($row['DonGia'])."đ</span></span>";echo "</a>";?>
										<div class="card-title">
										<div class="row p-2">
											<div class="input-group mb-3">
					                            <div class="input-group-prepend">
					                                <span class="input-group-text">Số lượng</span>
					                            </div>
					                            <input type="number" value="1" min="1" max="20" name="quantity" class="form-control">
					                            </div>
										</div>
										</div>
									</div>
									<input type="hidden" name="hidden_image" value="<?php echo $row['HinhDaiDien'];?>"/>
									<input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" />  
					                <input type="hidden" name="hidden_price" value="<?php echo $row["DonGia"]; ?>" />
									<div class="text-center my-1">
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
                } 
                else {
                    $message = "Không tìm thấy kết quả";
					echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        }
?>
</div>