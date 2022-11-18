<?php 
require "./Config/database.php";
require "./app/models/db.php";
require "./app/models/user.php";
$user = new User;
if(isset($_POST['btn-dangky']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $loi = "";   
    if(strlen($username) == 0 && strlen($username) == 0 && strlen($username) == 0)
    {
        $loi.="Xin hãy nhập thông tin!!";
    }
    if( strlen($username)  != strlen($username) )
    {
        $loi.="Xin hãy nhập lại mật khẩu!!";
    }
    if($loi == ""){       
        $insertIntoUser = $user->insertIntoUser($username,$password);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Trang Login</title>
    <link type="text/css" rel="stylesheet" href="css/stylelogin.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        <div class="img-bg">
            <img src="https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/tao_trang_dang_nhap/hinh_anh_minh_hoa.jpg"
                alt="Hình Ảnh Minh Họa">
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <?php //if($loi !=""): ?>
                <!-- <div class="alert alert-danger"><?php //echo $loi; ?></div> -->
                <?php //endif; ?>
                <h2>Trang Đăng Ký</h2>
                <form action="" method="POST">
                    <div class="input-form">
                        <span>Tên Người Dùng</span>
                        <input type="text" name="username" id="username">
                        <!-- <div class="invalid-feedback">
                            Username khong hop lệ, phải chứa tu 6 - 30 ky tu a-z0-9
                        </div> -->
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input-form">
                        <span>Nhập Lại Mật Khẩu</span>
                        <input type="password" name="repassword" id ="repassword">
                    </div>
                    <div class="input-form">
                        <input type="submit" name="btn-dangky" value="Đăng Ký">
                    </div>
                </form>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>

</html>