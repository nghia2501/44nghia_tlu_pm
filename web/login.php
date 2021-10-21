<?php
require_once("connect.php"); //gọi hàm kết nối
session_start();
   if(isset($_POST['dangky'])){
            if(empty($_POST['name'])||empty($_POST['password'])||empty($_POST['sdt'])){
                $_SESSION['erro']="Vui lòng điền đầy đủ thông tin";
                echo " Vui lòng điền đầy đủ thông tin";
            }
            else{
                $name = $_POST['name'];
                $password=$_POST['password'];
                $sdt=$_POST['sdt'];
                $sql="INSERT INTO `ad`( `name`, `password`, `phone`)
                 VALUES ('$name','$password','$sdt')";
                  
               
                $queryx = "SELECT * FROM ad WHERE name='. $name.'AND password ='.$password.' ";
                $reslute = mysqli_query($conn,$queryx);
                $data=array();
                while($row=mysqli_fetch_array($reslute,1)){
                    $data[]=$row;
                }
                 echo $sql;
                 if(mysqli_query($conn,$sql)){
                     $_SESSION["sucess"]="đăng ký thành công";
                     echo "đăng ký thành công";
                 }else{
                     $_SESSION["die"]="đăng nhập thất bại";
                     echo "đăng nhập thất bại";
                 }
            }
   }
   if(isset($_POST['dangnhap']))
   {  
       if(empty($_POST['name'])||empty($_POST['password'])){
        $_SESSION['erro']="Vui lòng điền đầy đủ thông tin";
        echo " Vui lòng điền đầy đủ thông tin"; 
       }
       else{
       $name =$_POST['name'];
       $password =$_POST['password'];
       if($name=="admin"&& $password=="123"){
        $_SESSION['name']=$name;
        $_SESSION['password']= $password;
           header("location:admin.php");
       }
       else{
           echo "sai tài khoản mật khẩu";
       }
    }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
       <div id="login">
           <div id="form">
             <form action="#" method="post">
                
                      <label for="">Tài khoản </label><br>
                      <input type="text" name="name" placeholder=" USE Name..."> <br>
                      <label for="">Mật khẩu</label><br>
                      <input type="password" name="password" placeholder="password...">
                      <br>
                      <label for="">Số điện thoại</label> <br>
                      <input type="text" name="sdt" id=""><br>
                      <button type="submit" name="dangnhap">Đăng Nhập</button>
                      <button type="submit" name="dangky">Đăng Ký</button>
             </form>
            </div>
       </div>
</body>
</html>