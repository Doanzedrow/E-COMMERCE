<?php
 include 'header.php' ?>
<?php   
    $perPage = 6;
    $pages = $_GET['pages'];
    $total = 0;
    foreach($getAllProducts as $v)
    {
        $total++;
    }
    $url = $_SERVER['PHP_SELF'];
    $phanTrang = $product->phanTrang($pages,$perPage);
    $totalLinks = ceil($total/$perPage);
    $paginateTest = $product->paginateTest($url,$total,$pages,$perPage,1);
    ?>

<!-- BREADCRUMB -->

<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
           
                <!-- aside Widget -->
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <?php if(isset($_POST['thuonghieu'])){ 
                include './productOfManu.php'; ?>
            <?php }
            else{ ?>
            <div id="store" class="col-md-9">
                <!-- store top filter -->

                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <?php          
						foreach($phanTrang as $v):	                           
						                   
						?>
                    <!-- product -->
                    <div class="col-md-4 col-xs-6" style="margin-bottom:50px">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/<?php echo $v['image'] ?>" alt="" style="width:260px; height:260px;">
                                <div class="product-label">
                                    <span class="sale">-<?php echo $v['discount'] ?>%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php?></p>
                                <h3 class="product-name"><a
                                        href="<?php echo 'product.php?id='.$v['id'] ?>"><?php echo substr($v['name'],0,23) ?></a>
                                </h3>
                                <h4 class="product-price">
                                    <?php echo  number_format($v['price'] - $v['price'] *$v['discount'] /100)." ₫";  ?>
                                    <br><del
                                        class="product-old-price"><?php echo number_format($v['price']) ." ₫"; ?></del>
                                </h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <?php $link1 = null; 
                                    if(isset($_SESSION['user']))
                                    {
                                        $link1 = 'wishlist.php?id='.  $v['id']."&&page=productOfprotypes.php"."&&type_id=".$_GET['type_id'];
                                    } ?>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><a href="<?php echo $link1; ?>"
                                            onclick="display()"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                                to
                                                wishlist</span></a></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                            class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                            view</span></button>
                                </div>
                            </div>
                            <?php $link = null; ?>
                            <?php if(isset($_SESSION['user']))
                                    {
                                        $link = "cart.php?id=". $v['id']."&&page=productOfprotypes.php"."&&type_id=".$_GET['type_id']."&&pages=".$_GET['pages'];
                                    } ?>
                            <div class="add-to-cart">
                                <a href="<?php echo $link ?>" onclick="display()"><button type="submit"
                                        class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                        cart</button></a>
                                <?php if(!isset($_SESSION['user'])): ?>
                                <script>
                                function display() {
                                    alert("Bạn phải đăng nhập trước đã!!");
                                }
                                </script>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                    <?php endforeach; ?>

                    <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>




                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">                  
                        <?php if($_GET['pages'] > 1):
                            $prev_page = $_GET['pages'] - 1; ?>
                            <li><a  href = 'test?&&pages=<?php echo $prev_page ?>'><i class="fa fa-angle-left"></i></a></li>
                        <?php endif; ?>
                        <?php foreach($paginateTest as $p): ?>
                            <?php echo $p; ?>
                        <?php endforeach; ?>
                            <?php if($_GET['pages'] < $totalLinks - 1):
                                $next_page = $_GET['pages'] + 1 ?>
                        <li><a  href = 'test?&&pages=<?php echo $next_page  ?>'><i class="fa fa-angle-right"></i></a></li>
                        <?php endif; ?>
                         
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <?php }?>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php include 'footer.php' ?>