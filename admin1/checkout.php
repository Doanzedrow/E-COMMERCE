
<?php include 'header.php';
  include 'sidenar.php';
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Checkout</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
      <div class="card-header">
                <h3 class="card-title">Checkout</h3>
                <a class="btn btn-success btn-sm px-3 mx-3" href="./productadd.php">
                        <i class="fas fa-plus"></i>
                        Add</a>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 29%">
                          FisrtName
                      </th>
                      <th style="width: 20%">
                          LastName
                      </th>
                      <th style="width: 40%">
                          Email
                      </th>
                      <th style="width: 40%">
                          Address
                      </th>
                      <th style="width: 40%">
                          City
                      </th>
                      <th style="width: 40%">
                          Country
                      </th>
                      <th style="width: 40%">
                          Phone
                      </th>
                      <th style="width: 40%">
                          Product
                      </th>
                      <th style="width: 40%">
                          Shipping
                      </th>
                      <th style="width: 40%">
                          Qty_buy
                      </th>
                      <th style="width: 40%">
                          Money
                      </th>
                      <th style="width: 40%">
                          Other_node
                      </th>
                      <th style="width: 20%">
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $getAllCheckout = $checkout->getAllCheckout();
                foreach($getAllCheckout as $va):
                 ?>
                  <tr>
                      <td>
                          <?php echo $va['fName'] ?>
                      </td>
                      <td>
                          <?php echo $va['lName'] ?>
                      </td>
                      <td>
                          <?php echo $va['email'] ?>
                      </td>
                      <td>
                          <?php echo $va['address'] ?>
                      </td>
                      <td>
                          <?php echo $va['city'] ?>
                      </td>
                      <td>
                          <?php echo $va['country'] ?>
                      </td>
                      <td>
                          <?php echo $va['phone'] ?>
                      </td>
                      <td>
                          <?php echo $va['name'] ?>
                      </td>
                      <td>
                          <?php echo $va['shiping'] ?>
                      </td>
                      <td>
                          <?php echo $va['qty_buy'] ?>
                      </td>
                      <td>
                          <?php echo $va['money'] ?>
                      </td>
                      <td>
                      <?php echo $va['other_node'] ?>
                      </td>                    
                      <td class="project-actions text-left">
                          <a class="btn btn-info btn-sm" href="checkoutedit.php?checkout_id=<?php echo $va['checkout_id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="delCheckout.php?checkout_id=<?php echo $va['checkout_id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'footer.php'; ?>
