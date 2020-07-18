<?php
//index.php
$connect = mysqli_connect('localhost', 'root', '', 'shopthethao');
function make_query($connect)
{
 $query = "SELECT * FROM tbl_slide ORDER BY ID ASC";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#slides" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#slides" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="carousel-item active">';
  }
  else
  {
   $output .= '<div class="carousel-item">';
  }
  $output .= '
   <img src="'.$row["HinhAnh"].'" alt="'.$row["TenSlide"].'" />
   <div class="carousel-caption">
    <h3>'.$row["TenSlide"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>
