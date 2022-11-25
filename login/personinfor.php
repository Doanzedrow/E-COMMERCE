<?php 
require "../Config/database.php";
require "../app/models/db.php";
require "../app/models/personinfor.php";
require "../app/models/user.php";
$personinfor = new Personinfor;
$user = new User;
$getUser = $user->getUser();
foreach($getUser as $value)
{
    $id_user = $value['id_user'];
}
$check = true;
if(isset($_POST['btn-hoantat']))
{    
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $ngaysinh = $_POST['ngaysinh'];
    $phai = $_POST['phai'];  
    if(strlen( $fullname) == 0 || strlen( $email) == 0 || strlen( $sdt) == 0 || strlen( $ngaysinh) == 0 || $phai != 1 && $phai != 0)
    {
        $check = false;
    }
    if($check == true)
    {
        $insertPersioninfor = $personinfor->insertPersioninfor($fullname,$ngaysinh,$sdt,$email,$phai,$id_user);
        header('location:../login/resuccess.php');
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PersonInfor</title>
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
                <div class="alert alert-danger"><?php echo "Mời bạn nhập thông tin đầy đủ!"; ?></div>
                <?php endif; ?>       
                <h2>Thông Tin Cá Nhân</h2>
                <form action="" method="POST">               
                    <div class="input-form">
                        <span>Họ tên đầy đủ</span>
                        <input type="text" name="fullname" id="fullname">                      
                    </div>
                    <div class="input-form">
                        <span>Email</span>
                        <input type="text" name="email" id="email">                      
                    </div>
                    <div class="input-form">
                        <span>Số Điện Thoại</span>
                        <input type="text" name="sdt" id="sdt">                      
                    </div>
                    <div class="input-form">
                        <span>Ngày Sinh</span>
                        <input type="date" name="ngaysinh" id="ngaysinh">                      
                    </div>
                    <label class="form-label" style="padding-right:20px">Phái:</label>
                    <div class="form-check form-check-inline">                      
                        <input class="form-check-input" type="radio" name="phai" id="nam" value="1" checked="checked">   
                        <label class="form-check-label" for="nam">Nam</label>                   
                    </div>
                    <div class="form-check form-check-inline">                                         
                        <input class="form-check-input" type="radio" name="phai" id="nu" value="0"> 
                        <label class="form-check-label" for="nu">Nữ</label>
                    </div>
                    <div class="input-form">
                        <input type="submit" name="btn-hoantat" value="Hoàn tất">
                    </div>
                </form>
                <div class="input-form">
                        <a href="./register.php"><input type="submit" name="btn-quaylai" value="Quay lại"></a>
                    </div>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>

</html>