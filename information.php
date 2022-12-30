<?php
 include 'header.php' ?>
<?php 

require "./app/models/Personinfor.php";

if (isset($_SESSION['user']))
{
    $getidUser = $user->getIdUser($_SESSION['user']);
}
$personinfor = new Personinfor;
?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">My Account</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Profile</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- View Profile -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			
				foreach ($getidUser as $row) :
                    $getPer = $personinfor->getPersoninforById($row['id_user']);
					foreach ($getPer as $value) :?>
						<div class="profile-page">
							<table class="table-profile table-striped table">
								<tr>
									<td>
										<h3> Full name:</h3>
									</td>
									<td>
										<h4 class="text-left"> <?php echo $value['fullname'] ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h3>E-mail: </h3>
									</td>
									<td>
										<h4 class="text-left"> <?php echo $value['email'] ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h3>Ngày sinh: </h3>
									</td>
									<td>
										<h4 class="text-left"> <?php echo $value['ngaysinh'] ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h3>Phone: </h3>
									</td>
									<td>
										<h4 class="text-left"> <?php echo $value['sdt'] ?></h4>
									</td>
								</tr>
							</table>
						</div>
			<?php endforeach;
				endforeach;
			 ?>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col">
		<div class="total-price">
				<table>
					<tr>
						<td><a href="#" class="btn btn-success "><i class="fa fa-cog" aria-hidden="true"></i> Sửa trang cá nhân </a></td>
						<td><a href="#" class="btn  btn-warning "><i class="fa fa-repeat" aria-hidden="true"></i> Thay đổi mật khẩu</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div> -->
</div>
<?php include 'footer.php' ?>