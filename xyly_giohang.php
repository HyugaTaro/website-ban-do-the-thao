<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>
<?php
ob_clean();
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tbl_dmsp WHERE MaSP='" . $_GET["MaSP"] . "'");
			$itemArray = array($productByCode[0]["MaSP"]=>array('TenSP'=>$productByCode[0]["TenSP"], 'MaSP'=>$productByCode[0]["MaSP"], 'quantity'=>$_POST["quantity"], 'DonGia'=>$productByCode[0]["DonGia"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["MaSP"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["MaSP"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["MaSP"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>