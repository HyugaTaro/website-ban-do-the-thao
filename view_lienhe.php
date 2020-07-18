<div class="row">
	<div class="col-12 col-md-5">
		<h5 class="title-add text-center">HỆ THỐNG SHOWROOM CỦA <span>SOOCER SHOP</span></h5>
		<div class="wrapper-select-add">
			<select class="form-control" name="province" id="province" onchange="changCity22(this.value,'district');	">
				<option value>---Chọn Tỉnh - Thành phố---</option>
				<option value="1">TP. HCM</option>
				<option value="2">Bình Dương (đang thi công)</option>
			</select>
		</div>
		<ul class="list-group list-group-flush">
		  <li class="list-group-item">24/7 đường Nguyễn Văn Nguyễn, phường Tân Định, Quận 1, TP.HCM</li>
		  <li class="list-group-item">58 Phan Đăng Lưu, Xã Hiệp An, Thủ Dầu Một, Bình Dương</li>
		</ul>
		<br>
		<a style="text-decoration: none;" href="sms:01212219334"><img class="img-fluid" src="images/Icon/iconsms.gif" width="80" height="100%"><span class="text-dark"> Gửi tin nhắn cho chúng tôi</span></a>
		<a id="callNowButton" href="tel:01212219334" class="ft-btn">&nbsp;</a>
		<style>@media (max-width: 640px) {
		#callNowButton{
		display: block;
		height: 80px;
		position: fixed;
		left: 0;
		border-bottom-right-radius: 40px;
		border-top-right-radius: 40px;
		width: 100px;
		bottom: -20px;
		border-top: 2px solid rgba(51,187,51,1);
		background: url("http://vietsoftgroup.com/uploads/callbutton.png") center 10px no-repeat #009900;
		text-decoration: none;
		box-shadow: 0 0 5px #888;
		-webkit-box-shadow: 0 0 5px #888;
		-moz-box-shadow: 0 0 5px #888;
		z-index: 9999;
		}
		}
		</style>
	</div>
	<div class="col-12 col-md-7">
		<div class="textwidget custom-html-widget">
            <div">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2313162150294!2d106.6847091141165!3d10.793587561829765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d26ea780c1%3A0x2399e97fcb279b8b!2zMjQsIDcgTmd1eeG7hW4gVsSDbiBOZ3V54buFbiwgVMOibiDEkOG7i25oLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1587792015274!5m2!1svi!2s" width="750" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card">
			<form action="view_lienhe.php" method="POST">
			<div class="card-title">
				<h2 class="text-center my-2">Liên hệ</h2>
			</div>
			<div class="card-body">
				<input class="form-control my-2" type="text" name="hovaten" placeholder="Nhập Họ và tên">
				<input class="form-control my-2" type="text" name="email" placeholder="Nhập Email">
				<input class="form-control my-2" type="text" name="diachi" placeholder="Nhập Địa chỉ">
				<div class="small">Nhập lời góp ý, khiếu nại, báo lỗi... mà bạn muốn gửi đến chúng tôi tại đây:</div>
				<textarea class="form-control my-2" name="noidung"></textarea>
			</div>
			<div class="card-footer">
				<input type="submit" class="btn btn-danger" name="btn_themlh" value="Gửi đi">
			</div>
			</form>
			<?php 
				require('xuly_lienhe.php');
			?>
		</div>
	</div>
</div>
<div class="container mt-3">
	<div class="row text-uppercase text-white">
		<div class="col-12 col-md-3">
	    	<div class="card bg-primary">
	      		<div class="card-body text-center">
	        		<p class="card-text"><i class="fab fa-angellist mx-2"></i>Tư vấn bán hàng <br><i>01212219334</i></p>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-12 col-md-3">
	    	<div class="card bg-warning">
	      		<div class="card-body text-center">
	        		<p class="card-text"><i class="fab fa-battle-net mx-2"></i>Hỗ trợ dịch vụ <br><i>01212219334</i></p>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-12 col-md-3">
	    	<div class="card bg-danger">
	      		<div class="card-body text-center">
	        		<p class="card-text"><i class="fab fa-whmcs mx-2"></i>Tư vấn kỹ thuật <br><i>01212219334</i></p>
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-12 col-md-3">
	    	<div class="card bg-success">
	      		<div class="card-body text-center">
	        		<p class="card-text"><i class="fab fa-leanpub mx-2"></i>Email <br><i>hoangs4ng@gmail.com</i></p>
	      		</div>
	    	</div>
	  	</div>
	</div>
</div>