<?php
session_start();
if(!isset($_SESSION['name']))
{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <title>ADMIM</title>
    <link rel="stylesheet" href="cssadmin.css">

</head>

<body>
    <div id="container">
        <div id="conten">
            <div id="conset">
                <span style="font-size: 20px;">
                    <p>MOBI BUP</p>
                </span>


            </div>
            <div id="menu">
                <ul>
                    <li><a href="#"> <i class="fas fa-archway"></i> Trang Chủ</a></li>
                    <li><a href="#"><i class="fas fa-address-card"></i>Quản Lý Tin</a></li>
                    <li><a href="#"><i class="fas fa-comment-dots"></i>Chat</a></li>
                    <li><a href="#"><i class="fas fa-bell"></i>Thông báo</a></li>
                    <li><a href="#"><i class="fas fa-caret-down"></i>Thêm</a></li>
                </ul>

            </div>
            <div id="search">
            
           <input type="search" id="search" placeholder="Search..." />
           <span class="icon"><i class="fa fa-search"></i></span>
            </div>
        </div>
        

    </div>
 

  <!-- <a href="logout.php">
    <button type="submit" >
        đăng xuất
    </button>
    
</a> -->
<div id="table">
           <table border="solid">
                <tr> 
                    <th>ID</th>
                    <th>Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Số điện thoại</th>
                </tr>
                <tbody>
<?php
require_once("connect.php");
 $queryx = "SELECT * FROM ad";
 $reslute = mysqli_query($conn,$queryx);
 $data=array();
 while($row=mysqli_fetch_array($reslute,1)){
     $data[]=$row;
 }
  
// hiển thị thông tin ra table
for($i=0;$i<count($data);$i++){
    echo " 
    <tr> 
    <td>".($i+1)."</td>
    <td>".$data[$i]['name']."</td>
    <td>".$data[$i]['password']."</td>
    <td>".$data[$i]['phone']."</td>
    </tr>
    ";
}
?>
                </tbody>

           </table>
</div>

</body>

</html>