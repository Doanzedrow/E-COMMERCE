<?php 
include 'header.php'; ?>
<?php 
    require "./app/models/checkout.php";
    require "./app/models/manufactures .php";
	$checkout = new CheckOut;
    $manufactures =new Manufactures;
	$getAllManufactures = $manufactures->getAllManufactures(); 
    $getAllCheckout = $checkout->getAllCheckout($_GET['id_user']);
    ?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>Shopping cart</h1>
                <div class="goods-page">
                    <div class="goods-data clearfix">
                        <div class="table-wrapper-responsive">
                            <table summary="Shopping cart">
                                <tr>
                                    <th class="goods-page-image">Image</th>
                                    <th class="goods-page-description">Name product</th>

                                    <th class="goods-page-quantity">Quantity</th>
                                    <th class="goods-page-price">Price</th>
                                    <!-- <th class="goods-page-total" colspan="2">Total</th> -->
                                </tr>
                                <?php if (isset($_SESSION['cart'])):
											foreach ($_SESSION['cart'] as $key => $value):
												foreach ($getAllCheckout as $p):
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
                                            <div class="input-number">
                                                <input id="product-quantity" type="number" name="qty"
                                                    value="<?php echo $value ?>" readonly class="form-control input-sm">


                                            </div>
                                        </div>
                                    </td>

                                    <td class="goods-page-total">
                                        <strong><?php echo  number_format(($p['price'] - $p['price'] * number_format($p['discount']) /100) *$value) . " ₫"; ?>
                                        </strong>
                                    </td>

                                </tr>
                                <?php endif; endforeach; endforeach; ?>

                            </table>
                        </div>

                        
                        <?php endif; ?>
                    </div>
                    <a href="index.php"><button class="btn btn-default" type="submit">Continue shopping <i
                                class="fa fa-shopping-cart"></i></button></a>
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