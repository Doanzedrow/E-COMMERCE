<?php include './header.php';
include './sidenar.php';
if(isset($_GET['id_user'])):
    $id=$_GET['id_user'];
    $p=$personinfor->getPersoninforById($id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Infor Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Infor Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="inforedit.php" method="Post" enctype="multipart/form-data">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>                     
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputFullname">Fullname</label>
                                <input type="hidden" name="id_user" value="<?php echo $p[0]['id_user']?>">
                                <input value="<?php echo $p[0]['fullname']?>" name="fullname" type="text" id="inputFullname" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputNgaysinh">Ngaysinh</label>
                                <input value="<?php echo $p[0]['ngaysinh']?>" name="ngaysinh" type="text" id="inputNgaysinh" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputSDT">SDT</label>
                                <input value="<?php echo $p[0]['sdt']?>" name="sdt" type="text" id="inputSDT" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input  value="<?php echo $p[0]['email']?>" name="email" type="text" id="inputEmail" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputPhai">Phai</label>
                                <?php
                                if($p[0]['phai']==1):?>
                                <input checked name="phai" type="checkbox" id="inputPhai" class="form-control" row="4"></input>
                                <?php
                                else:
                                ?>
                                    <input  name="phai" type="checkbox" id="inputPhai" class="form-control" row="4"></input>
                                <?php endif?>                 
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="personinfor.php" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new user" class="btn btn-success float-right">
                    </div>
                </div>

        </section>
    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php endif; ?>
<?php include './footer.php' ?>