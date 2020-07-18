<?php
// session_start(); 
if (isset($_POST['del'])) {
        unset($_SESSION['giohang']);
        header('Location: index.php?action=giohang');
}
?>
<?php
include'connection/connection.php';
if ( isset( $_SESSION['giohang'] ) ) {
    $giohang = $_SESSION['giohang'];
    if ( ( isset( $_POST['capnhat'] ) ) && ( count( $_SESSION['giohang'] ) != '' ) ) {

        $soluong_cn = $_POST['SoLuong'];
        foreach ( $soluong_cn as $id => $sl ) {
            if ( $sl == 0 ) {
                unset( $_SESSION['giohang'][$id] );
            } else if ( $sl > 0 && is_numeric( $sl ) ) {
                $_SESSION['giohang'][$id] = $sl;
            }
            header( 'Location: index.php?action=giohang' );
        }
    }
}
?>

<?php if (!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0) {
        ?>
    <button class="btn btn-danger"><a class="text-white" href="index.php"><span style="transform: rotate(180deg);" class="fas fa-play mx-2"></span>Trở lại</a></button>
    <hr class="bg-light">
    <div class="text-center">
        <h5>Giỏ hàng rỗng. Bạn cần mua hàng để xem chi tiết giỏ hàng</h5>
        <img class="img-pluid" src="images/Icon/giohang.png" width="200" height="100%">
    </div>
    <?php }else{ ?>
<form method = 'POST'>
<?php
if ( isset( $_SESSION['giohang'] ) ) {
	$total = 0;
	$tongsp = 0;
    foreach ( $giohang as $id =>$ls ) {
        $row_show = mysqli_fetch_row(mysqli_query( $con, "SELECT * FROM tbl_dmsp WHERE IDSP in ('$id')" ) );
        $row_capnhat = mysqli_fetch_array(mysqli_query( $con, "SELECT (SoLuong - slDaBan) AS SLConLai FROM tbl_dmsp WHERE IDSP in ('$id')" ) );
        ?>
        <input type="hidden" value="<?php echo $row_capnhat['SLConLai']; ?>" id="sl_kt" />
        <div class = 'row mb-3'>
	        <div class = 'col-md-3 col-3 text-center'>
	        <a href = "index.php?action=chitiet&id=<?php echo $row_show[0] ?>"><img
	        src = "<?php echo $row_show[8]; ?>" class = 'img-thumbnail' width = '150' height = '100%' /></a>
	        </div>
	        <div class = 'col-md-3 col-3'>
	        <a
	        href = "index.php?action=chitiet&id=<?php echo $row_show['id'] ?>"><?php echo $row_show[2];
	        ?></a>
	        </div>
	        <div class = 'col-md-4 col-3 btn-block'>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-info font-weight-bold mb-3">Số lượng</span>
              </div>
              <?php echo '<input class="form-control" id="sl" type="number" min="1" max="100" value="' . $ls . '" name="SoLuong[' . $id . ']"/>';?>
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-info font-weight-bold mb-3">Đơn giá</span>
              </div>
              <input type="text" class="form-control" value="<?php echo number_format($row_show[5], 0); ?>" />
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text text-info font-weight-bold">Tổng tiền</span>
              </div>
              <input type="text" class="form-control" value="<?php echo number_format($row_show[5] * $ls); ?>" />
            </div>
	        
	        </div>
	        <div class="col-md-1 col-1 text-center p-4">
	            <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm trong giỏ hàng này không?');" href="add.php?action=delete&id=<?php echo $id ?>"><span
	                    class="text-danger"><img src="Admin/image/iconxoa.png" class="img-reponsive" width="40" height="40"></span></a>
	        </div>
    	</div>
        <hr class="light w-85">
        <script language='javascript'>
        $(function() {
        var sl = $('#sl').val();
        var slkt = $('#sl_kt').val();
        if (sl > slkt) {
            alert("Số lượng bạn nhập vượt quá số lượng sản phẩm hiện có của shop!");
            $('#sl').val(slkt);
            }
            });
        </script>
        <?php
        $total = $total + ($row_show[5] * $ls);
        $tongsp = $tongsp + $ls;
    }
    ?>
<div class="container-fluid">
    <hr class="light w-85">
    <div class="row text-center">
        <div class="col-md-4 col-2"></div>
        <div class="col-md-1 col-1"></div>
        <div class="col-md-1 col-1"></div>
        <div class="col-md-4 col-4">Tổng cộng : </div>
        <div class="col-md-2 col-2"><b><?php echo number_format($total); ?> VNĐ</b></div>
    </div>
    <hr class="light w-85">
</div>
    <div class="row">
        <div class="col-md-12 col-12 ml-3">
            <a href="index.php">
                <button type="button" class="btn btn-danger"><span style="transform: rotate(180deg);" class="fas fa-play"></span> Tiếp tục mua hàng</button>
            </a>
                <button type="submit" name="capnhat" class="btn btn-danger">Cập nhật</button>
                <input type="submit" name="del" class="btn btn-danger" value="Xóa hết">
            <a href="index.php?action=thanhtoan">
                <button type="button" class="btn btn-danger">Thanh toán <span class="fas fa-play"></span></button>
            </a>
        </div>
    </div>
    <?php
	}
	?>
</form>
<?php } ?>