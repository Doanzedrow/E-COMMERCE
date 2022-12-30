<?php session_start();
require "../Config/database.php";
require "../app/models/db.php"; 
require "../app/models/user.php";
$user = new User;
$loi = "";
$check = true;
$getUser = $user->getUser();
if(isset($_POST['btn-dangnhap']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($user->checklogin($username,$password))
    {
        foreach($getUser as $v)
        {
            if($v['username'] ==  $username)
            {
                $_SESSION['user'] = $v['id_user'];
                break;
            }
        }
        
        header('location:../index.php');
    }
    else
    {
        $loi.="Sai mật khẩu hoặc tài khoản!!";
        $check = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="../css/stylelogin.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>

<body>
    <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        <div class="img-bg">
            <a href="../index.php" target="_self">
                <img src="../img/anhnen3.jpg" alt="Hình Ảnh Minh Họa">
            </a>         
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <h2>Trang Đăng Nhập</h2>
                <form action="" method="post">
                    <?php if($check == false): ?>
                    <div class="alert alert-danger"><?php echo $loi; ?></div>
                    <?php endif; ?>
                    <div class="input-form">
                        <span>Tên Người Dùng</span>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="nho-dang-nhap">
                        <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
                    </div>
                    <div class="input-form">
                        <input type="submit" value="Đăng Nhập" name="btn-dangnhap">
                    </div>
                    <div class="input-form">
                        <p>Bạn Chưa Có Tài Khoản? <a href="register.php">Đăng Ký</a></p>
                    </div>
                </form>
                <div class="input-form">
                        <p>Đăng nhập với tư cách admin <a href="../admin1/loginadmin.php">Vào đây</a></p>
                    </div>
                <!-- <h3>Đăng Nhập Bằng Mạng Xã Hội</h3>
                <ul class="icon-dang-nhap">
                    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                    <li><i class="fa fa-google" aria-hidden="true"></i></li>
                    <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                </ul> -->
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>

</html>