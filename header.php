<?php 
	require "./Config/database.php";
	require "./app/models/db.php";
	require "./app/models/products.php";
	require "./app/models/protypes.php";
	$product = new Product;
	$protype = new protypes;
	$getAllProtypes = $protype->getAllProtypes();
	$getAllProducts = $product->getAllProducts(); 
    $getAllTopSellingProducts = $product->getAllTopSellingProducts();
    $getAllNewProducts = $product->getAllNewProducts();	
    $get3HotTop6Products = $product->get3HotTop6Products();
    $get5TopSellingProducts = $product->get5TopSellingProducts();
	?>
<?php session_start();

?>
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
                    <li><a href="./login/indexlogin.php"><i class="fa fa-user-o"></i> My Account</a></li>
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
                                <a href="ViewWishlist.php">
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