<?php
 include 'header.php' ?>
<?php 
	require "./app/models/manufactures .php";
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}		
	$manufactures = new Manufactures;
	$getProductById = $product->getProductById($id); 
    $getAllreview = $review->getAllreview();
	?>

<!-- BREADCRUMB -->
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <?php 					
						foreach($getProductById as $v): ?>
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="./img/<?php echo $v['image'] ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="./img/<?php echo $v['image'] ?>" alt="">
                    </div>

                </div>
            </div>

            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $v['name'] ?></h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 class="product-price">
                            <?php echo number_format($v['price'] - $v['price'] * $v['discount'] /100) . " ₫";?>
                            <del class="product-old-price"
                                style="padding-left:10px;"><?php echo number_format($v['price']) . " ₫"; ?></del>
                        </h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <p><?php echo $v['description'] ?></p>
                    <?php $link = null; ?>
                    <?php if(isset($_SESSION['user']))
                                    {
                                        $link = "cart.php?id=". $v['id']."&&page=product.php";
                                    } ?>
                    <form action="<?php echo $link; ?>" method="post">
                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" name="qty">
                                    <?php 
										 ?>
                                    <span class="qty-up">+ </span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <button type="submit" class="add-to-cart-btn" onclick="display()"><i
                                    class="fa fa-shopping-cart"></i> add to
                                cart</button>
                            <?php if(!isset($_SESSION['user'])): ?>
                            <script>
                            function display() {
                                alert("Bạn phải đăng nhập trước đã!!");
                            }
                            </script>
                            <?php endif; ?>
                    </form>
                </div>
                <?php endforeach; ?>
                <?php $link1 = null; ?>
                <?php   if(isset($_SESSION['user']))
                        {
                            $link1 = 'wishlist.php?id='.  $v['id']."&&page=product.php";
                        } ?>
                <ul class="product-btns">
                    <li><a href="<?php echo $link1; ?>" onclick="display()"><i class="fa fa-heart-o" <?php if(isset($_SESSION['wishlist'])){
                     foreach ($_SESSION['wishlist'] as $key => $value)
                     {
                        if ($v['id'] == $key)
                        {
                          echo 'style="color:red"';
                        }                                                            
                     }
                    }
                         ?>></i> add to
                            wishlist</a></li>
                    <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                </ul>
                <?php 
								foreach($getProductById as $va):
								foreach($getAllProtypes as $v):
									if($v['type_id'] == $va['type_id'] ):
									?>
                <ul class="product-links">
                    <li>Category:</li>
                    <li><a
                            href="./productOfprotypes.php?type_id=<?php echo $v['type_id'] ?>"><?php echo $v['type_name'] ?></a>
                    </li>
                </ul>
                <?php endif; endforeach; endforeach; ?>
                <ul class="product-links">
                    <li>Share:</li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>

            </div>
        </div>
        <!-- /Product details -->

        <!-- Product tab -->
        <div class="col-md-12">
            <div id="product-tab">
                <!-- product tab nav -->
                <ul class="tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                    <li><a data-toggle="tab" href="#tab2">Details</a></li>
                    <li><a data-toggle="tab" href="#tab3">Reviews <?php
                    $review = 0; 
                    foreach($getAllreview as $sao)
                    {
                        if($sao['id_product'] == $_GET['id'])
                        {
                            $review++;
                        }
                    } 
                    if($review > 0)
                    {
                        echo $review;
                    }
                    else
                    {
                        echo "";
                    }
                    ?></a></li>
                </ul>
                <!-- /product tab nav -->
                <?php 					
						foreach($getProductById as $v): ?>
                <!-- product tab content -->
                <div class="tab-content">
                    <!-- tab1  -->
                    <div id="tab1" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo $v['description'] ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- /tab1  -->

                    <?php                        
                        if($v['type_id'] == 2):
                    ?>
                    <!-- tab2  -->
                    <div id="tab2" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-profile table-striped table">
                                    <tr>
                                        <td>
                                            <h3>Kích thước màn hinh: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"><?php echo $v['kichthuocmanhinh'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Ram: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['ram'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Rom: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['rom'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Pin: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"><?php echo $v['pin'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Hệ điều hành: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"><?php echo $v['hedieuhanh'] ?> </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Card: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"><?php echo $v['card'] ?></h4>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>

                    <?php  endif; ?>
                    <?php                        
                        if($v['type_id'] == 3):
                    ?>
                    <!-- tab2  -->
                    <div id="tab2" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-profile table-striped table">
                                    <tr>
                                        <td>
                                            <h3>Chip:</h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['chip'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Pin: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['pin'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Cổng kết nối: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['congketnoi'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Công suất: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"><?php echo $v['congsuat'] ?></h4>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <?php  endif; ?>


                    <?php                        
                        if($v['type_id'] == 4):
                    ?>
                    <!-- tab2  -->
                    <div id="tab2" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-profile table-striped table">
                                    <tr>
                                        <td>
                                            <h3>Kích thước màn hinh: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"><?php echo $v['kichthuocmanhinh'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Độ phân giải: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['dophangiai'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Hệ điều hành: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"><?php echo $v['hedieuhanh'] ?> </h4>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>

                    <?php  endif; ?>


                    <?php                        
                        if($v['type_id'] == 5):
                    ?>
                    <!-- tab2  -->
                    <div id="tab2" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-profile table-striped table">
                                    <tr>
                                        <td>
                                            <h3>Kích thước màn hinh: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"><?php echo $v['kichthuocmanhinh'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Độ phân giải: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['dophangiai'] ?></h4>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>

                    <?php  endif; ?>


                    <?php                     
                    if($v['type_id'] == 1):
                    ?>
                    <!-- tab2  -->
                    <div id="tab2" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-profile table-striped table">
                                    <tr>
                                        <td>
                                            <h3>Kích thước màn hinh:</h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['kichthuocmanhinh'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Ram: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo $v['ram'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3> Rom: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php  echo $v['rom'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Pin: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo  $v['pin'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Hệ điều hành: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo  $v['hedieuhanh'] ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Card: </h3>
                                        </td>
                                        <td>
                                            <h4 class="text-left"> <?php echo  $v['chip'] ?></h4>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <?php  endif; ?>
                    <!-- /tab2  -->
                    <?php endforeach; ?>
                    <!-- tab3  -->
                    <?php 
                    $sosao = $slsao1 = $slsao2 = $slsao3 = $slsao4 = $slsao5 = $sao1 = $sao2  = $sao3 = $sao4 = $sao5 = 0; 
                    foreach($getAllreview as $re)
                    {
                        if($re['id_product'] == $id):
                            if($re['start'] == 1)
                            {
                                $slsao1++;
                            }
                            if($re['start'] == 2)
                            {
                                $slsao2++;
                            }
                            if($re['start'] == 3)
                            {
                                $slsao3++;
                            }
                            if($re['start'] == 4)
                            {
                                $slsao4++;
                            }
                            if($re['start'] == 5)
                            {
                                $slsao5++;
                            }
                        endif;
                        
                    }  
                    $sosao = (float)(($slsao1 + $slsao2*2  +$slsao3*3  +$slsao4*4  +$slsao5*5 )/5);
                    $sao1 = $slsao1/10*100;    
                    $sao2 = $slsao2/10*100;    
                    $sao3 = $slsao3/10*100;    
                    $sao4 = $slsao4/10*100;    
                    $sao5 = $slsao5/10*100;     
                    $sa1 = $sa2=$sa3=$sa4=$sa5="";
                                                    if($sosao >=0 && $sosao < 2)
                                                    {
                                                        $sa1 = "fa fa-star";
                                                        $sa2 = "fa fa-star-o";
                                                        $as3 = "fa fa-star-o";
                                                        $sa4 = "fa fa-star-o";
                                                        $sa5 = "fa fa-star-o";
                                                    } 
                                                    else if($sosao >=2 && $sosao < 3)
                                                    {
                                                        $sa1 = "fa fa-star";
                                                        $sa2 = "fa fa-star";
                                                        $sa3 = "fa fa-star-o";
                                                        $sa4 = "fa fa-star-o";
                                                        $sa5 = "fa fa-star-o";
                                                    }
                                                    else if($sosao >=3 && $sosao < 4)
                                                    {
                                                        $sa1 = "fa fa-star";
                                                        $sa2 = "fa fa-star";
                                                        $sa3 = "fa fa-star";
                                                        $sa4 = "fa fa-star-o";
                                                        $sa5 = "fa fa-star-o";
                                                    }
                                                    else if($sosao >=4 && $sosao < 5)
                                                    {
                                                        $sa1 = "fa fa-star";
                                                        $sa2 = "fa fa-star";
                                                        $sa3 = "fa fa-star";
                                                        $sa4 = "fa fa-star";
                                                        $sa5 = "fa fa-star-o";
                                                    }
                                                    else if($sosao >=5 && $sosao < 6)
                                                    {
                                                        $sa1 = "fa fa-star";
                                                        $sa2 = "fa fa-star";
                                                        $sa3 = "fa fa-star";
                                                        $sa4 = "fa fa-star";
                                                        $sa5 = "fa fa-star";
                                                    }    
                                                    else
                                                    {
                                                        $sa1 = "fa fa-star-o";
                                                        $sa1 = "fa fa-star-o";
                                                        $sa1 = "fa fa-star-o";
                                                        $sa1 = "fa fa-star-o";
                                                        $sa1 = "fa fa-star-o";
                                                    }                                                             
                    ?>
                    <div id="tab3" class="tab-pane fade in">
                        <div class="row">
                            <!-- Rating -->
                            <div class="col-md-3">
                                <div id="rating">
                                    <div class="rating-avg">
                                        <span><?php echo $sosao ?></span>
                                        <div class="rating-stars">
                                            <i class="<?php echo $sa1 ?>"></i>
                                            <i class="<?php echo $sa2 ?>"></i>
                                            <i class="<?php echo $sa3 ?>"></i>
                                            <i class="<?php echo $sa4 ?>"></i>
                                            <i class="<?php echo $sa5 ?>"></i>
                                        </div>
                                    </div>
                                    <ul class="rating">
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div style="width: <?php echo $sao5 ?>%;"></div>
                                            </div>
                                            <span class="sum"><?php echo $slsao5 ?></span>
                                        </li>
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div style="width: <?php echo $sao4 ?>%;"></div>
                                            </div>
                                            <span class="sum"><?php echo $slsao4 ?></span>
                                        </li>
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div style="width: <?php echo $sao3 ?>%;"></div>
                                            </div>
                                            <span class="sum"><?php echo $slsao3 ?></span>
                                        </li>
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div style="width: <?php echo $sao2 ?>%;"></div>
                                            </div>
                                            <span class="sum"><?php echo $slsao2 ?></span>
                                        </li>
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div style="width: <?php echo $sao1 ?>%;"></div>
                                            </div>
                                            <span class="sum"><?php echo $slsao1 ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Rating -->

                            <!-- Reviews -->
                            <div class="col-md-6">
                                <div id="reviews">
                                    <ul class="reviews">
                                        <?php foreach($getAllreview as $re): 
                                            if($re['id_product'] == $id):
                                            ?>
                                            
                                        <li>
                                            <div class="review-heading">
                                                <h5 class="name"><?php echo $re['username'] ?></h5>
                                                <p class="date"><?php echo $re['created_at'] ?></p>
                                                <div class="review-rating">
                                                    <?php
                                                    $s1 = $s2=$s3=$s4=$s5="";
                                                    if($re['start'] == 1)
                                                    {
                                                        $s1 = "fa fa-star";
                                                        $s2 = "fa fa-star-o";
                                                        $s3 = "fa fa-star-o";
                                                        $s4 = "fa fa-star-o";
                                                        $s5 = "fa fa-star-o";
                                                    } 
                                                    else if($re['start'] == 2)
                                                    {
                                                        $s1 = "fa fa-star";
                                                        $s2 = "fa fa-star";
                                                        $s3 = "fa fa-star-o";
                                                        $s4 = "fa fa-star-o";
                                                        $s5 = "fa fa-star-o";
                                                    }
                                                    else if($re['start'] == 3)
                                                    {
                                                        $s1 = "fa fa-star";
                                                        $s2 = "fa fa-star";
                                                        $s3 = "fa fa-star";
                                                        $s4 = "fa fa-star-o";
                                                        $s5 = "fa fa-star-o";
                                                    }
                                                    else if($re['start'] == 4)
                                                    {
                                                        $s1 = "fa fa-star";
                                                        $s2 = "fa fa-star";
                                                        $s3 = "fa fa-star";
                                                        $s4 = "fa fa-star";
                                                        $s5 = "fa fa-star-o";
                                                    }
                                                    else if($re['start'] == 5)
                                                    {
                                                        $s1 = "fa fa-star";
                                                        $s2 = "fa fa-star";
                                                        $s3 = "fa fa-star";
                                                        $s4 = "fa fa-star";
                                                        $s5 = "fa fa-star";
                                                    }  
                                                    else
                                                    {
                                                        $s1 = "fa fa-star-0";
                                                        $s2 = "fa fa-star-o";
                                                        $s3 = "fa fa-star-o";
                                                        $s4 = "fa fa-star-o";
                                                        $s5 = "fa fa-star-o";
                                                    }                                                                                                                                                                                           
                                                    ?>
                                                    <i class="<?php echo $s1; ?>"></i>
                                                    <i class="<?php echo $s2; ?>"></i>
                                                    <i class="<?php echo $s3; ?>"></i>
                                                    <i class="<?php echo $s4; ?>"></i>
                                                    <i class="<?php echo $s5; ?>"></i>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p><?php echo $re['coment'] ?></p>
                                            </div>
                                        </li>
                                        <?php endif;  endforeach; ?>

                                    </ul>
                                    <!-- <ul class="reviews-pagination">
                                        <li class="active">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <!-- /Reviews -->

                            <!-- Review Form -->
                            <div class="col-md-3">
                                <div id="review-form">
                                    <form action="insertreview.php?id=<?php echo $_GET['id']?>&&id_user=<?php  ?>"
                                        class="review-form" method="post">
                                        <textarea class="input" name="coment" placeholder="Your Review"></textarea>
                                        <div class="input-rating">
                                            <span>Your Rating: </span>
                                            <div class="stars">
                                                <input id="star5" name="rating" value="5" type="radio"><label
                                                    for="star5"></label>
                                                <input id="star4" name="rating" value="4" type="radio"><label
                                                    for="star4"></label>
                                                <input id="star3" name="rating" value="3" type="radio"><label
                                                    for="star3"></label>
                                                <input id="star2" name="rating" value="2" type="radio"><label
                                                    for="star2"></label>
                                                <input id="star1" name="rating" value="1" type="radio"><label
                                                    for="star1"></label>
                                            </div>
                                        </div>
                                        <button class="primary-btn">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /Review Form -->
                        </div>
                    </div>
                    <!-- /tab3  -->
                </div>
                <!-- /product tab content  -->
            </div>
        </div>
        <!-- /product tab -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>
            <?php 
                $count = 0;
                    foreach($getAllProducts as $v):	
					foreach($getProductById as $va):							
					if($va['type_id'] == $v['type_id'] && $v['menu_id'] == $va['menu_id'] && $v['name'] != $va['name'] && $count < 4):
                    $count++; ?>
            <!-- product -->
            <div class="col-md-3 col-xs-6" style="margin-bottom:50px">
                <div class="product">
                    <div class="product-img">
                        <img src="./img/<?php echo $v['image'] ?>" alt="" style="width:260px; height:260px;">
                        <div class="product-label">
                            <span class="sale">-<?php echo $v['discount'] ?>%</span>
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <?php foreach($getAllProtypes as $i):
									if($va['type_id'] == $i['type_id']):
									?>
                        <p class="product-category"><?php echo $i['type_name'] ?></p>
                        <?php endif; endforeach; ?>
                        <h3 class="product-name"><a
                                href="<?php echo 'product.php?id='.$v['id'] ?>"><?php echo substr($v['name'],0,23) ?></a>
                        </h3>
                        <h4 class="product-price">
                            <?php echo number_format($v['price'] - $v['price'] * $v['discount'] /100) . " ₫"; ?>
                            <br><del class="product-old-price"><?php echo number_format($v['price']). " ₫" ?></del>
                        </h4>
                        <div class="product-rating">
                        </div>
                        <?php $link1 = null; ?>
                        <?php   if(isset($_SESSION['user']))
                        {
                            $link1 = 'wishlist.php?id='.  $v['id']."&&page=product.php";
                        } ?>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><a href="<?php echo $link1; ?>" onclick="display()"><i
                                        class="fa fa-heart-o"></i><span class="tooltipp">add to
                                        wishlist</span></a></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                    to compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                    view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <a href="<?php echo $link; ?>" onclick="display()"><button type="submit"
                                class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                cart</button></a>
                    </div>
                </div>
            </div>
            <?php endif;  endforeach; endforeach; ?>
            <!-- /product -->



        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

<?php include 'footer.php' ?>