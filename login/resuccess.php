<?php
if(isset($_POST['btn-qldangnhap']))
{  
   
    header('location:../login/login.php');
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Success</title>
     <link type="text/css" rel="stylesheet" href="../css/stylelogin.css"/>
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
     
</head>
<body>
<section>
     <!--Bắt Đầu Phần Hình Ảnh-->
     <div class="img-bg">
         <img src="../img/anhnen3.jpg" alt="Hình Ảnh Minh Họa">
     </div>
     <!--Kết Thúc Phần Hình Ảnh-->
     <!--Bắt Đầu Phần Nội Dung-->
     <div class="noi-dung">
         <div class="form">
             <h2>Đăng Ký Thành Công</h2>
                <form action="" method="post">                 
                 <div class="input-form">
                     <input type="submit" value="Quay Lại Đăng Nhập" name="btn-qldangnhap">
                 </div>           
                </form>           
             </ul>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
 </section>
</body>
</html>