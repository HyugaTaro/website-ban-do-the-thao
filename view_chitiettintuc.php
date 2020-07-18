<?php
function dem_lan_xem($id)
    {
        include'connection/connection.php';
        $sql_view = "UPDATE  tbl_tintuc  SET viewcount = viewcount+1 WHERE ID = '".$id."'";
        mysqli_query($con, $sql_view);
        return $id;
    }
?>
<?php
	$id = $_GET['id'];
	$sql_ht= mysqli_query($con,"SELECT * from tbl_tintuc where ID = '".$id."' order by ID desc");
	while ($row_ht = mysqli_fetch_array($sql_ht))
	{
?>
<button class="btn btn-danger"><a class="text-white" href="index.php?action=danhmuctintuc&dm=<?php echo $row_ht['IDLoaiTinTuc']; ?>"><span style="transform: rotate(180deg);" class="fas fa-play mx-2"></span>Trở lại</a></button>
    <hr class="bg-light">
<div class="container-fluid padding">
    <img src="images/Icon/iconluotxem.png" class="img-reponsive" width="50" height="100%" /><span>Lượt xem:<?php echo '<a onclick="'.dem_lan_xem($id).'"></a>'; ?><?php echo $row_ht['viewcount']; ?></span>	
    <?php echo $row_ht['NoiDung'];?>
</div>
<?php }?>
