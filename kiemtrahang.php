 <?php

  $loi = 0;
  foreach ($_SESSION['shopping_cart'] as $stt => $soluong) {
      $sql = "select SoLuong,TenSP,slDaBan from tbl_dmsp where IDSP=$stt";
      $rows = mysql_query($sql);
      $row = mysql_fetch_array($rows);
      $sl = $_SESSION['shopping_cart'][$stt];
      if ($row['SoLuong'] == 0 or ($row['SoLuong'] - $row['slDaBan']) < $sl) {
          echo '<meta http-equiv="refresh" content="2;index.php?content=cart">';
          echo "Sản phẩm <font color='red'><b>" . $row['TenSP'] . "</b></font> đã hết hoặc không đủ hàng trong kho<br><br>";
          $loi += 1;
        }
    }
  if ($loi == 0)
    echo '<meta http-equiv="refresh" content="0;index.php?action=thanhtoan&action=thanhtoan">';

  ?> 