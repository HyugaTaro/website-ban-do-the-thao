<?php
session_start();
require('connection/connection.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Soccer Shop" />
    <meta property="og:image" content="images/giay1.jpg">
    <meta property="og:image:width" content="720" />
    <meta property="og:image:height" content="480" />
	<title>Soccer Shop</title>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Soccer Shop" />
    <meta name="description" content="Soccer Shop"/>
    <link rel="shortcut icon" type="images/png" href="images/Icon/iconlogo.png"/>
	<link rel="stylesheet" href="vender/css/bootstrap.css">
	<script type="text/javascript" src="vender/js/jquery.min.js"></script>
	<script type="text/javascript" src="vender/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vender/css/bootstrap.min.css"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- phần đánh giá -->
   <!--  <script type="text/javascript" language="javascript" src="http://tenmiencuaban.com/rating/js/behavior.js"></script>
    <script type="text/javascript" language="javascript" src="http://tenmiencuaban.com/rating/js/rating.js"></script>
    <link rel="stylesheet" type="text/CSS" href="http://tenmiencuaban.com/rating/CSS/rating.CSS" /> -->
	<!-- css và jquery -->
	<link rel="stylesheet" href="css/stylesanpham.css">
    <script type="text/javascript" src="jquery/index.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/bootstrap4/bootstrap_icons.asp">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js'> </script>
</head>
<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5dd028bfd96992700fc7c4a7/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<form action="index.php" method="POST">
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Đăng nhập</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="taikhoan">Tài khoản</label>
                            <input type="text" class="form-control" id="Username" name="txt_tendn" placeholder="Nhập tài khoản" id="taikhoan">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="txt_pass" placeholder="Nhập mật khẩu" id="password">
                            <p class="passwordError"></p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Ghi nhớ</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a data-toggle="modal" data-target="#myModalsignup">Đăng ký tài khoản</a>
                            </div>
                        </div>
                        <button type="submit" name="btn_dangnhap" class="btn btn-success btn-block my-3">Đăng nhập</button>
                        <?php
                        require("xuly_login.php");
                        ?>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
        <?php 
          require('xuly_login.php');
        ?>
    </form>
    <?php 
        require('dangky.php');
    ?>
    <?php 
        require('doimatkhau.php');
    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="index.php">
  	<img src="images/Icon/logoshop.png" width="120" height="100%" />
  </a>
  <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Trang chủ</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tin Tức
        </a>
        <div class="dropdown-menu sp" aria-labelledby="navbarDropdown">
          <?php 
            require('View/menutintuc.php');
          ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sản phẩm
        </a>
        <div class="dropdown-menu sp" aria-labelledby="navbarDropdown">
          <?php 
            require('View/menu_hangsx.php');
          ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=lienhe">Liên hệ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=gioithieu">Giới thiệu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link fab fa-facebook my-1" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Facebook" href="https://www.facebook.com/Soccer-SHOP-517545788646145/" target="_blank"></a>
        <a class="nav-link fab fa-instagram my-1" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Instagram" href="https://www.instagram.com/hoangs4ng/" target="_blank"></a>
        <a class="nav-link fab fa-youtube-square my-1" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Youtube" href="https://www.youtube.com/channel/UCif-8Qd9zL_y2SeGJz5bW-w/featured?view_as=subscriber" target="_blank"></a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right textcolor">
    	<li class="mx-2">
    		<?php
					//Đếm số sản phảm trong giỏ hàng
				// session_start();
				if (isset($_SESSION["giohang"]) && $_SESSION["giohang"] != null) {
					$count = count($_SESSION["giohang"]);
				} else {
					$count = 0;
				}
			?>
    		<a href="index.php?action=giohang"><span class="fas fa-cart-plus"></span>Giỏ hàng <?php echo $count; ?></a>
    	</li>
    	<?php
    		if ((isset($_SESSION['tendn']) && $_SESSION['tendn'])) {
    			?>
    			<li class="nav-item dropdown mx-2"><a id="doimatkhau" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['tendn'];?></a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="doimatkhau">
                      <a class="dropdown-item" href="index.php?action=hosokh"><i class="fab fa-github mx-2"></i>Hồ sơ cá nhân</a>
                      <a class="dropdown-item" href="index.php?action=donhangkh"><i class="fab fa-github mx-2"></i>Đơn hàng của tôi</a>
                      <a class="dropdown-item" data-toggle="modal" data-target="#myModaldoimk"><i class="fab fa-expeditedssl mx-2"></i>Đổi mật khẩu</a>
                      <a class="dropdown-item" href="logout.php"><i class="fas fa-file-export mx-2"></i>Đăng xuất</a>
                    </div>    
                </li>
    			<li class="mx-2"><a href="logout.php"><span class="fas fa-file-export">Đăng xuất</span></li>
    			<?php
    		}else{?>
    			<li class="mx-2"><a data-toggle="modal" data-target="#myModal"><span class="fas fa-user"></span> Đăng nhập</a></li>
     	<li class="mx-2"><a data-toggle="modal" data-target="#myModalsignup"><span class="fas fa-file-export"></span> Đăng ký</a></li>
     	<?php
    		}
    	?>
    </ul>
    
  </div>
</nav>
<div class="carousel slide" id="slides" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
        <li data-target="#slides" data-slide-to="3"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="images/banner0.jpg">
            <div class="carousel-caption">
                <h1 class="text-uppercase" style="font-size:3vw;text-shadow: 2px 2px 2px #00ff00;">Soccer Shop</h1>
                <h3 style="font-size:2vw;text-shadow: 2px 2px 2px #00ff00;">Cửa hàng chất lượng hàng đầu Việt Nam</h3>
            </div>
		</div>
		<div class="carousel-item">
			<img src="images/banner1.jpg">
		</div>
		<div class="carousel-item">
			<img src="images/banner2.jpg">
		</div>
        <div class="carousel-item">
			<img src="images/banner3.jpg">
		</div>
	</div>
	<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  	</a>
  	<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
  		<span class="carousel-control-next-icon" aria-hidden="true"></span>
  	</a>
</div>
<nav aria-label="breadcrumb" class="textcolor">
  <ol class="breadcrumb">
    <li class="breadcrumb-item m-2">
        <?php
            require('view/menu_loaisp.php');
        ?>
    </li>
        <form class="form-inline justify-content-center my-2 my-lg-0" action="index.php?action=timkiem" method="POST">
          <input class="form-control mr-sm-2 " type="text" name="search" placeholder="Search..."/>
          <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="ok">Search</button> -->
          <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="ok" value="Tìm kiếm"/>
        </form>
  </ol>
</nav>
<div class="container-fluid p-0">
    <div class="col-12 col-md-12">
    			<?php
    							if (isset($_GET['action'])) {
    								switch ($_GET['action']) {
    									case 'loai':
    										{
    											include('./view/view_theoloaisp.php');
    											break;
    										}
    									case 'giohang':
    										{
    											include('cart.php');
    											break;
    										}
    									case 'hang':
    										{
    											include('./view/view_theohangsx.php');
    											break;
    										}
                                        case 'danhmuctintuc':
                                            {
                                                include('./view/view_tintuc.php');
                                                break;
                                            }
    									case 'chitiet':{
    										include('view_chitietsp.php');
    										break;
    									}
                                        case 'hosokh':{
                                            include('hosokhachhang.php');
                                            break;
                                        }
                                        case 'donhangkh':{
                                            include('donhangcuatoi.php');
                                            break;
                                        }
                                        case 'chitietdh':{
                                            include('chitietdhkh.php');
                                            break;
                                        }
                                        case 'chitiettintuc':{
                                            include('view_chitiettintuc.php');
                                            break;
                                        }
    									case 'timkiem':{
    											include('timkiem.php');
    											break;
    									}
    									case 'thanhtoan':
    										{
    											include('thanhtoan.php');
    											break;
    										}
    									case 'lienhe':
    										{
    											include('view_lienhe.php');
    											break;
    										}
                                        case 'gioithieu':
                                            {
                                                include('view_gioithieu.php');
                                                break;
                                            }
    									case 'phukien':
    										{
    											include('view_lienhe.php');
    											break;
    										}
                                            case 'add':
                                            {
                                                include('add.php');
                                                break;
                                            }
    									default;
    										break;
    								}								
    							}else{                            
    							     // include('dsall.php');
                                    include('dssanpham.php');
                                }
    			?>
    </div>
</div>
<footer class="site-footer footer-light" style="background-color: #222222;">
	<div class="container-fluid">
		<div class="footer-row">
            <div class="row text-muted">
			<div class="col-md-3 col-sm-6">
				<hr class="light-100">
				<h2 class="text-center">Soccer Shop</h2>
				<hr class="light-100">
                <p>Chuyên cung cấp các mặt hàng về bóng đá như quần áo, giày, găng tay, các loại băng cổ tay cổ chân và còn nhiều phụ kiện khác.</p>
                <p>Nhận đặt làm in quần áo theo yêu cầu trên quần áo, balô, túi đựng giày...</p>
                <ul class="nav">
                    <li class="nav-item row">
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Facebook" href="https://www.facebook.com/Soccer-SHOP-517545788646145/" target="_blank">
                        <img class="img-fluid" src="images/Icon/iconfb.png" width="50" height="50">
                    </a>
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Instagram" href="https://www.instagram.com/hoangs4ng/" target="_blank">
                        <img class="img-fluid" src="images/Icon/iconig.png" width="50" height="50">
                    </a>
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Theo dõi Youtube" href="https://www.youtube.com/channel/UCif-8Qd9zL_y2SeGJz5bW-w/featured?view_as=subscriber" target="_blank">
                        <img class="img-fluid" src="images/Icon/iconyt.png" width="50" height="50">
                    </a>
                    </li>
                </ul>
			</div>
			<div class="col-md-3 col-sm-6">
				<hr class="light-100">
				<h2 class="text-center">Liên hệ</h2>
				<hr class="light-100">
				<p><b>Hotline:</b> 01212219334 (Vui lòng gọi trong thời gian làm việc)</p>
				<p><b>Email:</b> hoangs4ng@gmail.com</p>
                <p><b>Thời gian làm việc:</b> 8h-22h (T2 đến T7 nghỉ CN)</p>
                <b>ĐĂNG KÝ EMAIL</b>
                <div class="row my-3">
                    <div class="col-7">
                        <input class="form-control" style="border-radius: 15px" type="text" name="email" placeholder="Điền Email của bạn">
                    </div>
                    <div class="col-5">
                        <button class="btn btn-primary" style="border-radius: 10px">Đăng ký</button>
                    </div>
                </div>
			</div>
			<div class="col-md-3 col-sm-6">
				<hr class="light-100">
				<h2 class="text-center">CAM KẾT</h2>
				<hr class="light-100">
                <p>Vận chuyển trên toàn quốc</p>
                <p>Bảo mật thanh toán online</p>
                <p>Giá cả hợp lý trên thị trường</p>
                <p>Đảm bảo chất lượng sản phẩm tốt nhất</p>
                <p>Đổi trả sản phẩm chậm nhất trong 1 tuần</p>
			</div>
            <div class="col-md-3 col-sm-6">
                <section id="custom_html-2" class="widget_text widget widget_custom_html">
                    <hr class="light-100">
                    <h2 class="text-center">BẢN ĐỒ</h2>
                    <hr class="light-100">
                    <div class="textwidget custom-html-widget">
                        <p><b>Địa chỉ:</b> 24/7 đường Nguyễn Văn Nguyễn, phường Tân Định, Quận 1, TP.HCM</p>
                        <div>  
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.020639998605!2d106.687949!3d10.791759!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d26ea780c1%3A0x2399e97fcb279b8b!2zMjQsIDcgTmd1eeG7hW4gVsSDbiBOZ3V54buFbiwgVMOibiDEkOG7i25oLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2sus!4v1587790073384!5m2!1svi!2sus" width="300" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </section>                
            </div>
		</div>
        </div>
		<div class="text-center text-muted">
			<hr class="light-100">
			<p>&copy; SOCCER SHOP</p>
			<hr class="light-100">
		</div>
	</div>
</footer>
 <a href="#" class="cd-top ml-2">POPUP</a>
</body>
</html>