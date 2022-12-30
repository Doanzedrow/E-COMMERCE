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
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="header-search">
        <form action="./search.php" method="get">
            <input class="input" name="keyword" placeholder="Search here">
            <button class="search-btn">Search</button>
        </form>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product</h3>

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
                                <th style="width: 6%">
                                    Image
                                </th>
                                <th style="width: 20%">
                                    Name
                                </th>
                                <th style="width: 8%">
                                    Price
                                </th>
                                <th style="width: 30%">
                                    Description
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Manufactures
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Protypes
                                </th>
                                <th style="width: 20%">
                                    Feature
                                </th>
                                <th style="width: 20%">
                                    Created_at
                                </th>
                                <th style="width: 20%">
                                    Discount
                                </th>
                                <th style="width: 20%">
                                    Qty_sold
                                </th>
                                <th style="width: 20%">
                                    KichThuocManHinh
                                </th>
                                <th style="width: 20%">
                                    Chip
                                </th>
                                <th style="width: 20%">
                                    Ram
                                </th>
                                <th style="width: 20%">
                                    Rom
                                </th>
                                <th style="width: 20%">
                                    Pin
                                </th>
                                <th style="width: 20%">
                                    DoPhanGiai
                                </th>
                                <th style="width: 20%">
                                    CongketNoi
                                </th>
                                <th style="width: 20%">
                                    CongSuat
                                </th>
                                <th style="width: 20%">
                                    HeDieuHanh
                                </th>
                                <th style="width: 20%">
                                    Cart
                                </th>
                                <th style="width: 20%">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $url = $_SERVER['PHP_SELF'];
                        $pages = $_GET['pages'];
                        $perPage = 4;                       
                        $getsearchProducts = $product->getsearchProducts($pages,$perPage,$_GET['keyword']); 
                        $getsearch = $product->getsearch($pages,$perPage,$_GET['keyword']); 
                        $total = 0;
                        foreach($getsearch as $v){     
                             $total++;
                        }                                                  
                        $totalLinks = ceil($total/$perPage);          
                        $paginateOfSearch = $product->paginateOfSearch($url,$total,$pages,$perPage,1,$_GET['keyword']);
                        foreach($getsearchProducts as $value):
                        
                        ?>
                            <tr>
                                <td>
                                    <img style="width:50px; height:80px;" src="../img/<?php echo $value['image']?>"
                                        alt="">
                                </td>
                                <td>
                                    <?php echo $value['name']?>
                                </td>
                                <td>
                                    <?php echo number_format($value['price'])?>VND
                                </td>
                                <td>
                                    <?php echo substr($value['description'],0,50)?>...
                                </td>
                                <td>
                                    <?php echo $value['manu_name']?>
                                </td>
                                <td>
                                    <?php echo $value['type_name']?>
                                </td>
                                <td>
                                    <?php echo $value['feature']?>
                                </td>
                                <td>
                                    <?php echo $value['created_at']?>
                                </td>
                                <td>
                                    <?php echo $value['discount']?>
                                </td>
                                <td>
                                    <?php echo $value['qty_sold']?>
                                </td>
                                <td>
                                    <?php echo $value['kichthuocmanhinh']?>
                                </td>
                                <td>
                                    <?php echo $value['chip']?>
                                </td>
                                <td>
                                    <?php echo $value['ram']?>
                                </td>
                                <td>
                                    <?php echo $value['rom']?>
                                </td>
                                <td>
                                    <?php echo $value['pin']?>
                                </td>
                                <td>
                                    <?php echo $value['dophangiai']?>
                                </td>
                                <td>
                                    <?php echo $value['congketnoi']?>
                                </td>
                                <td>
                                    <?php echo $value['congsuat']?>
                                </td>
                                <td>
                                    <?php echo $value['hedieuhanh']?>
                                </td>
                                <td>
                                    <?php echo $value['card']?>
                                </td>
                                <td class="project-actions text-left">
                                    <a class="btn btn-info btn-sm" href="edit_product.php?id=<?php echo $value['id']?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="delproduct.php?id=<?php echo $value['id']?>">
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
                <div class="store-filter clearfix">
                    <ul class="store-pagination">
                        <?php if($_GET['pages'] > 1):
                            $prev_page = $_GET['pages'] - 1; ?>
                        <li><a href='searchproduct.php?keyword=<?php echo $_GET['keyword'] ?>pages=<?php echo $prev_page ?>'><i class="fa fa-angle-left"></i></a>
                        </li>
                        <?php endif; ?>

                        <?php echo $paginateOfSearch;?>
                            
                        <?php if($_GET['pages'] < $totalLinks - 1):
                                $next_page = $_GET['pages'] + 1 ?>
                        <li><a href='searchproduct.php?keyword=<?php echo $_GET['keyword'] ?>?pages=<?php echo $next_page  ?>'><i class="fa fa-angle-right"></i></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'footer.php'; ?>