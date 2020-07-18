<!DOCTYPE html>
<html>
<head lang="en">
    <title>Chi tiết sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
<?php
	// if (isset($_POST["btn_dathang"])) {
	$id = $_GET['id'];
	$sql=mysqli_query($con,"select * from tbl_dmsp where IDSP=$id order by IDSP desc");
	// echo "<h2>Chi tiết sản phẩm </h2>".$sql['TenSP'];
	// echo $id;
	while ($row=mysqli_fetch_array($sql))
	{
?>
<div class="container">
<div class="row">
<div class="col-12 col-md-8">
<div class="card mb-3" style="max-width: 100%;">
  <div class="row no-gutters">
    <div class="col-md-4">
		<img src="<?php echo $row['HinhDaiDien'];?>" class='card-img img-reponsive img-thumbnail p-2'/>
    </div>
    <div class="col-md-8">
      <div class="card-body">			
					<h5 class="card-title font-weight-bold"> <?php echo $row['TenSP'] ?></h5>
					<p class="card-text">Giá: <span class="text-danger font-weight-bold"><?php echo number_format($row['DonGia'],0,",",".");?></span> VNĐ</p>
							<p class="card-text">Tình trạng:
								<?php 
								$dem = $row['SoLuong'] - $row['slDaBan'];
								if( $dem >0)
									echo "Số sản phẩm còn (".$dem.")";
								else 
									echo "<img class='img-fluid' src='images/hethang.png'";
								?>
                            </p>
							<form method="post" action="index.php?action=add&id=<?php echo $row['IDSP'];?>">
                <div class="row my-3 ml-0">
								<p class="card-title">Số lượng mua :</p> 
                <input type="number" value="1" min="1" max="20" name="quantity" class="form-control">
                </div>
								<div align="center">
                  <input type="hidden" name="hidden_masp" value="<?php echo $row['MaSP'];?>"/>
                  <input type="hidden" name="hidden_image" value="<?php echo $row['HinhDaiDien'];?>"/>
                  <input type="hidden" name="hidden_name" value="<?php echo $row["TenSP"]; ?>" /> 
                  <input type="hidden" name="hidden_price" value="<?php echo $row["DonGia"]; ?>" />
  								<?php 
  									if($dem <=0)
  										echo "<a href='index.php?content=hethang'><p>Vui lòng quay lại sau khi có hàng</p></a>
  										";
  									else { ?>
  										<?php echo "<input class='btn btn-primary btn-block' type='submit' name='btn_dathang' value='Cho vào giỏ'/>";?>
  										<?php } ?>
								</div>
							</form>
        <ul class="nav">
            <li class="nav-item">
            <a class="nav-link fab fa-facebook my-1" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Facebook" href="https://www.facebook.com/Soccer-SHOP-517545788646145/"></a>
            </li>
            <li class="nav-item">
            <a class="nav-link fab fa-instagram my-1" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Instagram" href="https://www.instagram.com/hoangs4ng/"></a>
            </li>
            <li class="nav-item">
            <a class="nav-link fab fa-youtube-square my-1" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Youtube" href="https://www.youtube.com/channel/UCif-8Qd9zL_y2SeGJz5bW-w/featured?view_as=subscriber"></a>
            </li>
        </ul>
        </div>
    </div>
  </div>
</div>
</div>
<div class="col-12 col-md-4">
<ul class="list-group">
    <li class="list-group-item list-group-item-secondary"><center><h2>DỊCH VỤ</h2></center></li>
    <li class="list-group-item">
        <div class="media">
            <img src="images/icon/icongiaohang.png" class="mr-3" width="25px" height="25px">
            <div class="media-body">
            <h6 class="mt-0">GIAO HÀNG MIỄN PHÍ</h6>
            <span>Hóa đơn trên 1.000.000 VND</span>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="media">
          <img src="images/icon/icondoitra.png" class="mr-3" width="25px" height="25px">
          <div class="media-body">
            <h6 class="mt-0">ĐỔI TRẢ MIỄN PHÍ</h6>
            <span>Trong vòng 7 ngày</span>
          </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="media">
          <img src="images/icon/iconthanhtoan.png" class="mr-3" width="25px" height="25px">
          <div class="media-body">
            <h6 class="mt-0">THANH TOÁN</h6>
            <span>Sau khi đã nhận hàng</span>
          </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="media">
          <img src="images/icon/icondt.png" class="mr-3" width="25px" height="25px">
          <div class="media-body">
            <h6 class="mt-0">HỖ TRỢ MUA NHANH</h6>
            <span>012219334</span>
            <span>( từ 8h đến 22h )</span>
          </div>
        </div>
    </li>
</ul>
</div>
</div>
</div>
<ul class="nav nav-tabs" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-profile" role="tab">Đánh giá</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab">Thông tin sản phẩm</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-contact" role="tab">Hướng dẫn chọn size</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade" id="pills-home" role="tabpanel">
    <div class="container-fluid">
      <p><?php echo $row['DienGiai']?></p>
    </div>
  </div>
  <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
    <div class="container my-3">
      <div class="hihi">
       <form method="POST" action="">
          <textarea class="form-control my-2" name="txt_noidung" placeholder="Nhập bình luận..."></textarea>
          <div class="text-left">
            <input type="submit" name="btn_gui" class="btn btn-danger" value="Bình luận" />
            <?php 
              require('xuly_comment.php');
            ?>
          </div>
        </form>
      </div>
        <?php 
          require('connection/connection.php');
          $sql_comment = "SELECT * FROM tbl_comment cmt, tbl_dmsp sp, tbl_user kh 
                      WHERE (cmt.IDSP = sp.IDSP) AND (cmt.IDUser = kh.IDUser) AND sp.IDSP = " . $id . " AND cmt.Trangthai = 0 order by IDComment desc";
                $result_comment = mysqli_query($con, $sql_comment);
                while ($row_comment = mysqli_fetch_array($result_comment)) {
                    ?>
                  <div class="media my-2">
                        <img src="images/Icon/anhkh.jpg" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                        <div class="media-body">
                            <h4><?php echo $row_comment['TenNguoiSuDung']; ?> | <small><i><?php echo $row_comment['date']; ?></i></small></h4>
                            <p><?php echo $row_comment['NoiDung']; ?></p>
                            <div class="row">
                                <a href="#traloi" class="ml-3" data-toggle="collapse">Trả lời</a>
                                <a href="#" class="ml-3">Xóa</a>
                                <div class="form-control border-0 form-group">
                                    <div id="traloi" class="collapse">
                                        <form method="POST" action="">
                                            <textarea class="form-control mb-2" name="txt_noidung" placeholder="Bình luận ..." autofocus></textarea>
                                            <div class="text-right">
                                                <input type="submit" name="btn_gui" class="btn btn-danger mb-3" value="Bình luận" />
                                                <?php require('xuly_comment.php'); ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
          <?php
          }
          ?>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel">
    <br><h5>BỘ QUẦN ÁO BÓNG ĐÁ</h5>
    <p>• Chất liệu THUN HÀN cao cấp</p>
    <p>• KHÔNG NHĂN – KHÔNG XÙ – KHÔNG PHAI</p>
    <p>• Thấm hút mồ hôi cực tốt</p>
    <p>• Thiết kế mạnh mẽ, hiện đại</p>
    <hr>
    <p>✪ Hướng dẫn chọn size Bộ quần áo đấu bóng đá hàng thun lạnh.</p>
    <p>• Size S: 45-55kg</p>
    <p>• Size M : 55-60kg</p>
    <p>• Size L : 60-70kg</p>
    <p>• Size XL : 70-80kg</p>
    <p>✪ Hướng dẫn chọn size Bộ quần áo đấu bóng đá hàng Thái Lan.</p>
    <p>• Size S: 55-60kg</p>
    <p>• Size M : 60-70kg</p>
    <p>• Size L : 70-80kg</p>
    <p>• Size XL : 80-90kg</p>
    <p>Chọn size chỉ mang tính chất tương đối, khách vui lòng inbox chiều cao và cân nặng để shop tư vấn size cho chính xác nhé.</p>
    <hr>
    <p>HƯỚNG DẪN CÁCH ĐO SIZE GIÀY</p>
    <p>Chiều dài bàn chân Size Giày</p>
    <p>21cm ---> Size 38</p>
    <p>22cm ---> Size 39</p>
    <p>23cm ---> Size 40</p>
    <p>24cm ---> Size 41</p>
    <p>25cm ---> Size 42</p>
    <p>26cm ---> Size 43</p>
    <p>27cm ---> Size 44</p>
    <p>28cm ---> Size 45</p>
    <hr>
    <p>✪ CAM KẾT:</p>
    <p>• Ảnh chụp thật 100% ( Bên ngoài có thể đẹp hơn trong ảnh )</p>
    <p>• Miễn phí đổi trả trong vòng 7 ngày.</p>
    <p>• HOÀN TIỀN 100% NẾU CÓ LỖI CỦA SHOP HOẶC NHÀ SẢN XUẤT.</p>
    <p>Chân thành cảm ơn quý khách !</p>
  </div>
</div>
 <button class="btn btn-primary btn-block" type="button" disabled>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    <span class="text-uppercase">sản phẩm tương tự</span>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  </button>
  <?php require('sptuongtu.php'); ?>
  <?php }?>
<script>
$(document).ready(function(){
    $("ul#tabs li").click(function(e){
        if (!$(this).hasClass("active")) {
            var tabNum = $(this).index();
            var nthChild = tabNum+1;
            $("ul#tabs li.active").removeClass("active");
            $(this).addClass("active");
            $("ul#tab li.active").removeClass("active");
            $("ul#tab li:nth-child("+nthChild+")").addClass("active");
        }
    });
});
</script>
</body>
</html>
<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"comment_add.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>