<?php include 'header.php' ?>
<?php   
	require "./app/models/manufactures .php";
	if(isset($_GET['type_id']))
	{
		$id = $_GET['type_id'];
	}
	$manufactures = new Manufactures;
	$getProtypeById = $product->getProtypeById($id);
	$getAllManufactures = $manufactures->getAllManufactures(); ?>

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
                                    <input type="checkbox" name="thuonghieu[]" id="<?php echo $v['manu_name']?>" value="<?php echo $v['manu_name']?>">
                                    <label for="<?php echo $v['manu_name'] ?>">
                                        <span></span>
                                        <?php echo $v['manu_name'] ?>
                                    <?php
										$a = 0;
									 	foreach($getProtypeById as $i):
										if($v['manu_id'] == $i['menu_id']):
											$a++; ?>
                                        <?php endif; endforeach; ?>
                                        <small><?php echo '( ' .$a.' )' ?></small>

                                    </label>
                                </div>
                                <?php endforeach; ?>							
							</form>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                  
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <?php 
						foreach($getProtypeById as $v):	
						foreach($getAllProtypes as $va):
						if($v['type_id'] == $va['type_id'] ):					
						?>
                        <!-- product -->
                        <div class="col-md-4 col-xs-6" style="margin-bottom:50px">
                            <div class="product">
                                <div class="product-img">
                                    <img src="./img/<?php echo $v['image'] ?>" alt=""
                                        style="width:260px; height:260px;">
                                    <div class="product-label">
                                        <span class="sale">-<?php echo $v['discount'] ?>%</span>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category"><?php echo $va['type_name']?></p>
                                    <h3 class="product-name"><a href="<?php echo 'product.php?id='.$v['id'] ?>"><?php echo substr($v['name'],0,23) ?></a></h3>
                                    <h4 class="product-price"><?php echo $v['price']- $v['price'] * number_format($v['discount']) /100  ?> <del
                                            class="product-old-price"><?php echo $v['price'] ?></del>
                                    </h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                    <button class="add-to-wishlist"><a href="wishlist.php?id=<?php echo $v['id'] ?>"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></a></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                class="tooltipp">add to compare</span></button>
                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                view</span></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                <a href="cart.php?id=<?php echo $v['id'] ?>"><button type="submit"
                                                    class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                    cart</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                        <?php endif; endforeach; endforeach; ?>

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
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <?php include 'footer.php' ?>