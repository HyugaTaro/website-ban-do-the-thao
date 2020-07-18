<?php
session_start();
$id= $_GET['id'];
        if($id != "")
        {
            if(isset($_SESSION['giohang'][$id]))
                            {
                                    $_SESSION['giohang'][$id]++;
                             }
                            else
                            {
                                    $_SESSION['giohang'][$id] = 1;
                            }
        }        
        else
        {
            
        } 
        header('Location: index.php');
        if (isset($_GET["action"])) {
                if ($_GET["action"] == "delete") {
                    foreach ($_SESSION["giohang"] as $keys => $values) {
                        if ($keys == $id) {
                            unset($_SESSION["giohang"][$keys]);
                            header('location: index.php?action=giohang');
                        }
                    }
                }
            }
?>
