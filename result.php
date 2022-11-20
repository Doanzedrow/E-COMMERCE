<?php
include 'header.php' ?>
<?php 
	require "./app/models/manufactures .php";
	$manufactures = new Manufactures;
	if (isset($_POST['keyword'])){
		$key = $_POST['keyword'];	
	}
	$searchProducts = $product->searchProducts($key);
	$getAllManufactures = $manufactures->getAllManufactures();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $e = array();   
        if(($_POST['type_prd']) == 0)
        {     
            foreach($getAllProtypes as $k)
            {
                array_push($e,$k['type_id']);    
            }               
        }      
        else{
            $e['type_prd'] = $_POST['type_prd'];
        }
       
    }
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
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <?php						
								foreach($getAllManufactures as $v):?>
                        <form action="" method="POST">
                            <div class="input-checkbox">
                                <input type="checkbox" name="thuonghieu[]" id="<?php echo $v['manu_name']?>"
                                    value="<?php echo $v['manu_name']?>">
                                <label for="<?php echo $v['manu_name'] ?>">
                                    <span></span>
                                    <?php echo $v['manu_name'] ?>
                                    <?php
										$a = 0;
									 	foreach($searchProducts as $i):
										if($v['manu_id'] == $i['menu_id']):
											$a++; ?>
                                    <?php endif; endforeach; ?>
                                    <small><?php echo '( ' .$a.' )' ?></small>

                                </label>
                            </div>
                            <?php endforeach; ?>
                            <button type="submit" class="custom-btn btn-8"><span>Confirm</span></button>
                        </form>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->
            <?php if(isset($_POST['thuonghieu'])){ 
                include './resaulmanu.php'; ?>
            <?php }
            else{ ?>
            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->

                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <?php						
							foreach ($searchProducts as $v):
								foreach($getAllProtypes as $va):
									if($v['type_id'] == $va['type_id']):
                                        foreach($e as $value):
                                            if( $va['type_id'] == $value ):
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
                                <p class="product-category"><?php echo $va['type_name']?></p>
                                <h3 class="product-name"><a
                                        href="<?php echo 'product.php?id='.$v['id'] ?>"><?php echo substr($v['name'],0,23) ?></a>
                                </h3>
                                <h4 class="product-price">
                                    <?php echo  number_format($v['price'] - $v['price'] *$v['discount'] /100)." ₫";  ?>
                                    <br> <del
                                        class="product-old-price"><?php echo number_format($v['price']) ." ₫";  ?></del>
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
                                        $link1 = 'wishlist.php?id='.  $v['id'];
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
                                        $link = "cart.php?id=". $v['id'];
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
                    <?php endif; endforeach; endif; endforeach; endforeach;  ?>
                    <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>




                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
            <?php }?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php include 'footer.php' ?>