<?php 
session_start();
	require "./Config/database.php";
	require "./app/models/db.php";
	require "./app/models/products.php";
	require "./app/models/protypes.php";
	require "./app/models/manufactures .php";	
	$product = new Product;
	$protypes = new protypes;
	$manufactures = new Manufactures;
	$getAllProducts = $product->getAllProducts(); 
	$getAllProtypes = $protypes->getAllProtypes();
	$getAllManufactures = $manufactures->getAllManufactures(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
<!-- Theme styles START -->
<link href="assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
	<!-- Theme styles END -->
	<!-- Global styles START -->
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Global styles END -->
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +84-968-673-591</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i>tranhuudoan2003@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i>42A Lê Trọng Tấn Dĩ An Bình Dương</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                    <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="./img/logonhom8.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                        <form action="result.php" method="get">
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <?php									
					                foreach ($getAllProtypes as $value) { ?>
                                    <option value="<?php echo $value["type_id"] ?>"><?php echo $value["type_name"] ?></option>                 
                                    <?php } ?>
                                </select>
                                <input class="input" name="keyword" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="ViewWishlist">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <?php if(isset($_SESSION['wishlist'])):
                                    $qty1 = 0; foreach($_SESSION['wishlist'] as $k => $values): ?>
                                    <div class="qty"><?php echo ++$qty1; ?></div>
                                    <?php endforeach; endif;?>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <?php
                                    if(isset($_SESSION['cart'])):
                                    $qty = 0; foreach($_SESSION['cart'] as $k => $values): ?>
                                    <div class="qty"><?php echo ++$qty; ?></div>
                                    <?php endforeach; endif;?>
                                </a>
                                <div class="cart-dropdown">

                                    <div class="cart-list">
                                        <?php 
                                    //session_destroy();
                                    if(isset($_SESSION['cart'])):
                                    foreach($_SESSION['cart'] as $k => $values):
                                    foreach($getAllProducts as $v):
                                    if($v['id'] == $k): ?>
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="./img/<?php echo $v['image'] ?>" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#"><?php echo $v['name'] ?></a></h3>
                                                <h4 class="product-price"><span
                                                        class="qty"><?php echo $values ?>x</span><?php echo ($v['price'] - $v['price'] * number_format($v['discount']) /100) *$values  ?></h4>
                                            </div>
                                            <a href="del.php?id=<?php echo $k ?>"><button class="delete"><i class="fa fa-close"></i></button></a> 
                                        </div>
                                        <?php endif; endforeach; endforeach; endif;?>
                                    </div>

                                    <div class="cart-summary">     
                                        <?php if(isset($_SESSION['cart'])): ?>                   
                                        <small><?php echo $qty; ?> Item(s) selected</small>
                                       
                                        <?php                                        
                                        $price = 0;
                                        foreach($_SESSION['cart'] as $k => $values):
                                        foreach($getAllProducts as $v):
                                            if($v['id'] == $k):
                                        $price += ($v['price'] - $v['price'] * number_format($v['discount']) /100) *$values;
                                        ?>
                                        <?php endif; endforeach; endforeach;  ?>
                                        <h5>SUBTOTAL: $<?php echo $price; ?></h5>
                                        <?php endif; ?>
                                        
                                        
                                    </div>
                                    <div class="cart-btns">
                                        <a href="ViewCart.php">View Cart</a>
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>

                                </div>

                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php										
					foreach ($getAllProtypes as $value) { 	?>
                    <li><a
                            href="productOfprotypes.php?type_id=<?php echo $value["type_id"] ?>"><?php echo $value["type_name"] ?></a>
                    </li><?php } ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">

			<!-- BEGIN SIDEBAR & CONTENT -->
			<div class="row margin-bottom-40">
				<!-- BEGIN CONTENT -->
				<div class="col-md-12 col-sm-12">
					<h1>My WishList</h1>
					<div class="goods-page">
						<div class="goods-data clearfix">
							<div class="table-wrapper-responsive">
								<table summary="Shopping cart">
									<tr>
										<th class="goods-page-image">Image</th>
										<th class="goods-page-description">Name product</th>
										
										<th class="goods-page-quantity">Quantity</th>
										<th class="goods-page-price">Old price</th>
										<th class="goods-page-total" colspan="2">Total</th>
									</tr>
										<?php if (isset($_SESSION['wishlist'])):
											foreach ($_SESSION['wishlist'] as $key => $value):
												foreach ($getAllProducts as $p):
													if ($p['id'] == $key):
										 ?>
									<tr>
										<td class="goods-page-image">
											<a href="javascript:;"><img src="./img/<?php echo $p['image'] ?>" alt=""></a>
										</td>
										<td class="goods-page-description">
											<h3><a href="javascript:;"><?php echo $p['name'] ?></a></h3>
											
										</td>
										
										<td class="goods-page-quantity">
											<div class="product-quantity">
												<input id="product-quantity" type="text" value="<?php echo $value ?>" readonly class="form-control input-sm">
											</div>
										</td>
										<td class="goods-page-price">
											<strong>$<?php echo number_format($p['price'])  ?> </strong>
										</td>
										<td class="goods-page-total">
										<strong>$<?php echo number_format(($p['price'] - $p['price'] * number_format($p['discount']) /100) *$values)  ?> </strong>
										</td>
										<td class="del-goods-col">									
                                            <a href="delViewwishlist.php?id=<?php echo $key ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
                                            <a href="cartofwishlist.php?id=<?php echo $p['id'] ?>"><button type="submit"
                                                    class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                    cart</button></a>
										</td>
									</tr>
									<?php endif; endforeach; endforeach; ?>
								
								</table>
							</div>

							<div class="shopping-total">
								<ul>
									<li class="shopping-total-price">
										<em>Total</em>
                                        <?php                                        
                                        $price = 0;
                                        foreach($_SESSION['wishlist'] as $k => $values):
                                        foreach($getAllProducts as $v):
                                            if($v['id'] == $k):
                                        $price += ($v['price'] - $v['price'] * number_format($v['discount']) /100) *$values;
                                        ?>
                                         <?php endif; endforeach; endforeach; endif;  ?>
										<strong class="price"><span>$</span><?php echo number_format( $price) ?> </strong>
									</li>
								</ul>
							</div>
						</div>
						<a href="index.php"><button class="btn btn-default" type="submit">Continue shopping <i class="fa fa-shopping-cart"></i></button></a> 
						
					</div>
				</div>
				<!-- END CONTENT -->
			</div>
			<!-- END SIDEBAR & CONTENT -->
		</div>
		<!-- /container -->
	</div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
     
    

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>