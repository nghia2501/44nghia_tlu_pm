<?php

 $conn = mysqli_connect("localhost","root","","testphp");
 if($conn){
     mysqli_query($conn,"SET NAME'UTF8'");
     echo "kết nối thành công";
 }
 else{
     echo " không thể kết nối";
 }

?>