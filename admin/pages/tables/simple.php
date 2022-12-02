<?php include './header.php' ?>
<?php
require "../../Config/database.php";
require "../../app/models/db.php";
require "../../app/models/products.php";
$product = new Product;
$getAllProducts = $product->getAllProducts(); 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Simple Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Manu_id</th>
                                        <th>Type_id</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Feature</th>
                                        <th>Created_at</th>
                                        <th>Discount</th>
                                        <th>Qty_sold</th>
                                        <th>Kichthuocmanhinh</th>
                                        <th>Chip</th>
                                        <th>Ram</th>
                                        <th>Rom</th>
                                        <th>Pin</th>
                                        <th>Dophangiai</th>
                                        <th>Congketnoi</th>
                                        <th>Congsuat</th>
                                        <th>Hedieuhanh</th>
                                        <th>Card</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($getAllProducts as $values): ?>
                                    <tr>

                                        <td><?php echo $values['id'] ?></td>
                                        <td><?php echo $values['name'] ?></td>
                                        <td><?php echo $values['menu_id'] ?></td>
                                        <td><?php echo $values['type_id'] ?></td>
                                        <td><?php echo number_format($values['price']) ?></td>
                                        <td><img src="../../../img/<?php echo $values['image'] ?>" alt=""
                                                style="width:30px; height:30px"></td>
                                        <td><?php echo $values['description'] ?></td>
                                        <td><?php echo $values['feature'] ?></td>
                                        <td><?php echo $values['created_at'] ?></td>
                                        <td><?php echo $values['discount'] ?></td>
                                        <td><?php echo $values['qty_sold'] ?></td>
                                        <td><?php echo $values['kichthuocmanhinh'] ?></td>
                                        <td><?php echo $values['chip'] ?></td>
                                        <td><?php echo $values['ram'] ?></td>
                                        <td><?php echo $values['rom'] ?></td>
                                        <td><?php echo $values['pin'] ?></td>
                                        <td><?php echo $values['dophangiai'] ?></td>
                                        <td><?php echo $values['congketnoi'] ?></td>
                                        <td><?php echo $values['congsuat'] ?></td>
                                        <td><?php echo $values['hedieuhanh'] ?></td>
                                        <td><?php echo $values['card'] ?></td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <button class="btn btn-danger btn-sm" id="<?php echo $values['id']  ?>">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>

                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    
                                  <?php include './del.php'; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>

</html>