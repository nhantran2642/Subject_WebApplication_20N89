<?php

@include 'connect_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="style.css">

</head>

<body>

   <div class="container">
      <div class="content">
         <h1>Hi, Admin</h1>
         <h1>Welcome to <span>admin page</span></h1>
         <br>
         <!-- <a href="login_form.php" class="btn">login</a>
         <a href="register_form.php" class="btn">register</a> -->
         <!-- <a href="logout.php" class="btn">logout</a> -->
         <a href="xemthongtinnv.php" class="btn">Xem Danh sách Nhân viên</a><br><br>
         <a href="xemthongtinpb.php" class="btn">Xem Danh sách Phòng ban</a><br><br>
         <a href="timkiem.php" class="btn">Tìm Kiếm Nhân viên</a><br><br>
         <a href="capnhappb.php" class="btn">Cập Nhập Thông tin Phòng ban</a><br><br>
         <a href="capnhapnv.php" class="btn">Cập Nhập Thông Tin Nhân Viên</a><br><br>
         <a href="add_nv.php" class="btn">Thêm mới nhân viên</a>
      </div>

   </div>

</body>

</html>