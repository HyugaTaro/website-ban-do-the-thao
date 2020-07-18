<div class="row mt-4">
    <?php
    require('connection/connection.php');
    $sql_sptt = "SELECT * FROM tbl_dmsp WHERE IDHang = '" . $row['IDHang'] . "'";
    $query_sptt = mysqli_query($con, $sql_sptt);
    if (mysqli_num_rows($query_sptt) > 0) {
        while ($row_sptt = mysqli_fetch_array($query_sptt)) { ?>
            <div class="col-md-3 mb-3">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-100 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <form method="post" action="index.php?action=add&id=<?php echo $row['IDSP'];?>">
                            <img src="<?php echo $row_sptt['HinhDaiDien'] ?>" class="card-img-top img-thumbnail rounded-circle mb-3" alt="...">
                            <div class="card-body text-center p-0">
                                <h5 class="card-title"><?php echo $row_sptt['TenSP'] ?></h5>
                                <p class="card-text">Đơn giá : <span class="font-weight-bold text-danger"><?php echo number_format($row_sptt['DonGia'], 0, ",", "."); ?></span>đ</p>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>