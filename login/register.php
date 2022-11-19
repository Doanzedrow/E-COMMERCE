<?php 
require "../Config/database.php";
require "../app/models/db.php";
require "../app/models/user.php";
$user = new User;
$check = true;
$checkpass = true;
if(isset($_POST['btn-dangky']))
{  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $loi1 = "";   
    $loi2 = "";   
    if(strlen($username) == 0 || strlen($password) == 0 ||strlen($repassword) == 0 )
    {
        $check = false;
    }
    if($password !=  $repassword )
    {
        $loi2.="Xin hãy nhập lại mật khẩu!!";
        $checkpass = false;
    }
    if($check == false)
    {
        $loi1.="Xin hãy nhập thông tin!!";
    } 
    if($loi1 == "" && $loi2==""){       
        $insertIntoUser = $user->insertIntoUser($username,$password);
        header('location:../login/checkregister.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Trang Login</title>
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
            <img src="../img/anhnen3.jpg"
                alt="Hình Ảnh Minh Họa">
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <?php if($check == false): ?>
                <div class="alert alert-danger"><?php echo $loi1; ?></div>
                <?php endif; ?>
                <?php if($checkpass == false): ?>
                <div class="alert alert-danger"><?php echo $loi2; ?></div>
                <?php endif; ?>
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
                <div class="input-form">
                        <a href="./login.php"><input type="submit" name="btn-quaylai" value="Quay lại"></a>
                    </div>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>

</html>