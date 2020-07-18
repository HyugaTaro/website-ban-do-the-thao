<?php define('DB_HOST', 'localhost'); // hostname là localhost
 
define('DB_USER', 'root'); // tài khoản kết nối CSDL
 
define('DB_PASSWORD', ' '); // mật khẩu tài khoản kết nối với CSDL
 
define('DB_NAME', 'shopthethao'); // tên cơ sở dữ liệu
 
try {
    // tạo kết nối cơ sở dữ liệu
    $db = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASSWORD);
 
    // chế độ báo lỗi: cho phép bạn xử lý lỗi và dừng các đoạn code quan trọng lại
 
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $db->exec("set names utf8");
 
}
catch(PDOException $errMsg)
{
     echo 'Lỗi: ' . $errMsg->getMessage();
}
?>