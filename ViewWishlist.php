<?php 
include 'header.php' ?>
<?php 

$perPage = 6;
$pages = $_GET['pages'];
$total = 0;
if(isset($_SESSION['wishlist']))
{
    foreach($_SESSION['wishlist'] as $v)
    {
            
        $total++;
    }
}                                                     
$totalLinks = ceil($total/$perPage);
$url = $_SERVER['PHP_SELF'];

$paginateOfWish = $product->paginateOfWish($url,$total,$pages,$perPage,1);

?>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- store products -->
            <div class="row">
                <?php if (isset($_SESSION['wishlist'])):
						foreach ($_SESSION['wishlist'] as $key => $value):
                            //$getProductByIdPage = $product->getProductByIdPage($key,$pages,$perPage);
						foreach ($getAllProducts as $p):
						if ($p['id'] == $key):
				?>
                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">

                        <div class="product-img" style="width:263px; height:300px">
                            <img src="./img/<?php echo $p['image'] ?>" alt="" style="width:263px; height:316px">
                            <div class="product-label">
                                <span class="sale">-<?php echo $p['discount'] ?>%</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <?php foreach($getAllProtypes as $va):
                                        if($va['type_id'] == $p['type_id']): ?>
                            <p class="product-category"><?php echo $va['type_name'] ?></p>
                            <?php endif; endforeach; ?>
                            <h3 class="product-name"><a
                                    href="<?php echo 'product.php?id='.$p['id'] ?>"><?php echo substr($p['name'],0,23) ?></a>
                            </h3>
                            <h4 class="product-price">
                                <?php echo  number_format($p['price'] - $p['price'] *$p['discount'] /100) . " ₫"; ?>
                                <br>
                                <del class="product-old-price"><?php echo  number_format($p['price']) . " ₫";?></del>
                            </h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><a href="delViewwishlist.php?id=<?php echo $key ?>&&pages<?php echo $_GET['pages'] ?>"><i
                                            class="fa fa-heart" style="color:red"></i><span class="tooltipp">del to
                                            wishlist</span></a></button>
                            </div>
                        </div>
                        <?php if(isset($_SESSION['user']))
                            {
                                $link = "cart.php?id=". $p['id'].'&&page=index.php';
                            } ?>
                        <div class="add-to-cart">
                            <a href="<?php echo  $link; ?>"><button type="submit" class="add-to-cart-btn"><i
                                        class="fa fa-shopping-cart"></i> add to
                                    cart</button></a>
                        </div>

                    </div>
                </div>
                <!-- /product -->
                <?php  endif;  endforeach; endforeach; endif; ?>
            </div>
            <!-- /store products -->

            <!-- store bottom filter -->
            <div class="store-filter clearfix" style="margin-top:100px">
                <span class="store-qty">Showing 20-100 products</span>
                <ul class="store-pagination">
                    <?php if($_GET['pages'] > 1):
                            $prev_page = $_GET['pages'] - 1; ?>
                    <li><a href='ViewWishlist.php?pages=<?php echo $prev_page ?>'><i class="fa fa-angle-left"></i></a>
                    </li>
                    <?php endif; ?>

                    <?php echo $paginateOfWish; ?>

                    <?php if($_GET['pages'] < $totalLinks - 1):
                                $next_page = $_GET['pages'] + 1 ?>
                    <li><a href='ViewWishlist.php?pages=<?php echo $next_page  ?>'><i class="fa fa-angle-right"></i></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /store bottom filter -->
        </div>
        <!-- /STORE -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<?php include 'footer.php' ?>