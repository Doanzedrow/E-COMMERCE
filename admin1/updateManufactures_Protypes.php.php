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
                    <h1>Update</h1>
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
    <form action="update.php" method="Post" enctype="multipart/form-data">
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

                                <?php
                                if (isset($_GET['manu_id'])) {
                                ?>
                                <label for="inputName">Manufactures name </label>
                                <?php
                                    $getAllManufactures = $manufacture->getAllManufactures();
                                    foreach ($getAllManufactures as $value) {

                                        if ($value['manu_id'] == $_GET['manu_id']) {
                                    ?>
                                <input name="namemanu" type="text" id="inputName" class="form-control"
                                    value="<?php echo $value['manu_name'] ?>">
                                <input type="hidden" name="manu_id" value="<?php echo $value['manu_id'] ?>">
                                <?php }
                                    }
                                }
                                ?>
                                <?php
                                if (isset($_GET['type_id'])) {
                                ?>
                                <label for="inputName">Protypes name </label>
                                <?php
                                    $getAllProtypes = $protype->getAllProtypes();
                                    foreach ($getAllProtypes as $value) {

                                        if ($value['type_id'] == $_GET['type_id']) {
                                    ?>
                                <input name="type_name" type="text" id="inputName" class="form-control"
                                    value="<?php echo $value['type_name'] ?>">
                                <input type="hidden" name="type_id" value="<?php echo $value['type_id'] ?>">
                                <?php }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="protypes.php" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Update" class="btn btn-success float-right">
                    </div>
                </div>

        </section>
    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include './footer.php' ?>