<?php include './header.php';
include './sidenar.php';

if (isset($_GET['checkout_id'])) :
    $checkout_id = (int)$_GET['checkout_id'];
    $c = $checkout->getCheckoutById($checkout_id);
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">CheckOut Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="editCheckout.php" method="POST" enctype="multipart/form-data">
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
                                    <label for="inputName">Fisrt name</label>
                                    <input type="hidden" name="checkout_id" value="<?php echo $c[0]['checkout_id'] ?>">
                                    <input value="<?php echo $c[0]['fName'] ?>" name="fName" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Last name</label>
                                    <input value="<?php echo $c[0]['lName'] ?>" name="lName" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email</label>
                                    <input value="<?php echo $c[0]['email'] ?>" name="email" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Address</label>
                                    <input value="<?php echo $c[0]['address'] ?>" name="address" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">City</label>
                                    <input value="<?php echo $c[0]['city'] ?>" name="city" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Country</label>
                                    <input value="<?php echo $c[0]['country'] ?>" name="country" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Number phone</label>
                                    <input value="<?php echo $c[0]['phone'] ?>" name="phone" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">ID</label>
                                    <input value="<?php echo $c[0]['id'] ?>" name="id" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Shiping</label>
                                    <input value="<?php echo $c[0]['shiping'] ?>" name="shiping" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Qty buy</label>
                                    <input value="<?php echo $c[0]['qty_buy'] ?>" name="qty_buy" type="text" id="inputName" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Money</label>
                                    <input value="<?php echo $c[0]['money'] ?>" name="money" type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Node</label>
                                    <input value="<?php echo $c[0]['other_node'] ?>" name="other_node" type="text" id="inputName" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                        </div>
                    </div>

            </section>
        </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php endif; ?>
<?php include './footer.php' ?>