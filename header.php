<?php 
session_start();
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>NHOM8</title>

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
    <link type="text/css" rel="stylesheet" href="css/styledrop.css" />
    <link type="text/css" rel="stylesheet" href="css/styleform.css" />
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
                    <li>
                        
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-user-o"></i>
                                <?php 
                                    if(isset($_SESSION['user']))
                                    {
                                        echo "Xin chào " . $_SESSION['user']; 
                                    }
                                    else
                                    {
                                        echo "My Account ";
                                    } 
                                ?>
                            </a>
                            <div class="noidung_dropdown">
                                <?php if(isset($_SESSION['user'])): ?>  
                                <a href="./information.php">Information</a>                              
                                <a href="./logout/logout.php">Logout</a>     
                                                       
                               <?php else: ?>
                                    <a href="./login/login.php">Login</a>                                 
                                <?php  endif;?>                                                                
                            </div>
                        </div>
                    </li>
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
                            <a href="index.php" class="logo">
                                <img src="./img/nhom8.jpg" alt="" style="width:230px;">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="./results.php" method="get">
                                <select class="input-select" name="type_prd">
                                    <option value="0">All Categories</option>
                                    <?php									
					                foreach ($getAllProtypes as $value) { ?>
                                    <option  value="<?php echo $value["type_id"] ?>"><?php echo $value["type_name"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <input class="input" name="keyword" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <?php 
                    ?>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                            <?php $link = null; ?>
                                    <?php if(isset($_SESSION['user']))
                                    {
                                        $link = "ViewWishlist.php";
                                    } ?>
                                <a href="<?php echo $link; ?>" onclick="display()">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <?php if(isset($_SESSION['wishlist'])):
                                    $qty1 = 0; foreach($_SESSION['wishlist'] as $k => $values): ?>
                                    <div class="qty"><?php echo ++$qty1; ?></div>
                                    <?php endforeach; endif;?>
                                    <?php if(!isset($_SESSION['user'])): ?>
                                        <script>
                                        function display() {
                                            alert("Bạn phải đăng nhập trước đã!!");
                                        }
                                        </script>
                                        <?php endif; ?>
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
                                                        class="qty"><?php echo $values ?>x</span><?php echo number_format(($v['price'] - $v['price'] * $v['discount'] /100) *$values) . " ₫";  ?>
                                                </h4>
                                            </div>
                                            <a href="del.php?id=<?php echo $k ?>"><button class="delete"><i
                                                        class="fa fa-close"></i></button></a>
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
                                        $price += ($v['price'] - $v['price'] *$v['discount'] /100) *$values;
                                        ?>
                                        <?php endif; endforeach; endforeach;  ?>
                                        <h5>SUBTOTAL: <?php echo  number_format($price) . " ₫"; ?></h5>
                                        <?php endif; ?>


                                    </div>
                                    <div class="cart-btns">
                                    <?php $link = $link2 = null; ?>
                                    <?php if(isset($_SESSION['user']))
                                    {
                                        $link = "ViewCart.php";
                                        $link2 = "checkout.php";
                                    } ?>
                                        <a href="<?php echo $link; ?>" onclick="display()">View Cart</a>
                                        <a href="<?php echo $link2; ?>" onclick="display()">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                    <?php if(!isset($_SESSION['user'])): ?>
                                        <script>
                                        function display() {
                                            alert("Bạn phải đăng nhập trước đã!!");
                                        }
                                        </script>
                                        <?php endif; ?>
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
                            href="productOfprotypes.php?type_id=<?php echo $value["type_id"] ?>&&pages=1"><?php echo $value["type_name"] ?></a>
                    </li><?php } ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->