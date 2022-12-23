<?php include './header.php';
include './sidenar.php';
if(isset($_GET['id_user'])):
    $id=$_GET['id_user'];
    $p=$user->getIdUser($id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="edituser.php" method="Post" enctype="multipart/form-data">
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
                                <label for="inputUser">User</label>
                                <input type="hidden" name="id_user" value="<?php echo $p[0]['id_user']?>">
                                <input  value="<?php echo $p[0]['username']?>" name="username" type="text" id="inputUser" class="form-control" >
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputpass">Password</label>
                                <input value="<?php echo $p[0]['password'] ?>" name="password" type="text" id="inputpass" class="form-control"  >
                            </div>
                        </div>                    
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="user.php" class="btn btn-secondary">Cancel</a>
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