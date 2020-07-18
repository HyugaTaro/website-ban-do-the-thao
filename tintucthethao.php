<?php 
    $sql="select * from tbl_tinTuc";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_assoc($result)){
      echo "<div class='card mb-3 mx-2'>
	        	<div class='row no-gutters'>
		        	<div class='col-md-4 my-4'><img class='card-img' src=".$row["HinhDaiDien"]."></div>
			      		<div class='col-md-8'>
				            <div class='card-body'><h5 class='card-title'>".$row["TieuDe"]."</h5>
				            <button class='btn btn-outline-primary'><a href='./index.php?action=chitiettintuc&id=".$row['ID']."'>Chi tiết</a></button>
				      		<p class='card-text'><small class='text-muted'>".$row["NgayDang"]."</small></p>
			      		</div>
		      		</div>
	      		</div>
      		</div>";
		}
  	}
?>

 