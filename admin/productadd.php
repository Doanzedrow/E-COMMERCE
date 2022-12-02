<?php include './header.php';
include './sidenar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="add.php" method="Post" enctype="multipart/form-data">
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
                                <label for="inputName">Name</label>
                                <input name="name" type="text" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">price</label>
                                <input name="price" type="text" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Image</label>
                                <input name="image" type="file" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name ="description" id="inputDescription" class="form-control" row="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Manufactures</label>
                                <select name="manu_id" id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <?php $getAllManufactures  = $manufacture->getAllManufactures();
                                foreach($getAllManufactures as $va):
                                ?>
                                <option value="<?php echo $va['manu_id'] ?>"><?php echo $va['manu_name'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Protype</label>
                                <select name="type_id" id="inputStatus" class="form-control custom-select">
                               
                                <option selected disabled>Select one</option>
                                <?php $getAllProtypes  = $protype->getAllProtypes();
                                foreach($getAllProtypes as $va):
                                ?>
                                <option value="<?php echo $va['type_id'] ?>"><?php echo $va['type_name'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Feature</label>
                                <input name="feature" type="checkbox" id="inputClientCompany" class="form-control" row="4"></input>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                    </div>
                </div>

        </section>
    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include './footer.php' ?>