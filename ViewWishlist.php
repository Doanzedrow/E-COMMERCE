<?php include 'header.php' ?>
<?php 
	require "./app/models/manufactures .php";		
	$manufactures = new Manufactures;
	$getAllManufactures = $manufactures->getAllManufactures(); ?>


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
     

    <?php include 'footer.php' ?>