<?php
 include 'header.php' ;
 
 ?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<?php 
    if(isset($_SESSION['erroruser'])):?>
    
    <script>
        alert("Xin hãy nhập đầy đủ thông tin!!");
    </script>
    <?php endif; 
    unset($_SESSION['erroruser']);
    ?>
    
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
		<form action="checkoder.php" method="post">
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                   
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="first-name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="last-name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="country" placeholder="Country">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" placeholder="Telephone">
                        </div>
                        <div class="order-notes">
                            <textarea class="input" name="note" placeholder="Order Notes"></textarea>
                        </div>
                   

                </div>
                <!-- /Billing Details -->

                <!-- Shiping Details -->

                <!-- /Shiping Details -->

                <!-- Order notes -->

                <!-- /Order notes -->
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <?php if(isset($_SESSION['cart'])): ?>
                    <div class="order-products">
                       
                        <?php foreach($_SESSION['cart'] as $k => $value):
								foreach($getAllProducts as $p):
									if($p['id' ]== $k):
								
								?>
                        <div class="order-col">
                            <div><?php echo $value; ?>x <?php echo $p['name'] ?></div>
                            <div>
                                <?php echo number_format(($p['price'] - $p['price'] * $p['discount'] /100) *$value) . " ₫"; ?>
                            </div>
                        </div>
                        <?php endif; endforeach; endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <?php if(isset($_SESSION['cart'])): ?>
                        <div><strong>TOTAL</strong></div>
                        <?php                                                                             
                                        $price = 0;
                                        foreach($_SESSION['cart'] as $k => $values):
                                        foreach($getAllProducts as $v):
                                            if($v['id'] == $k):
                                        $price += ($v['price'] - $v['price'] *$v['discount'] /100) *$values;
                                        ?>
                        <?php endif; endforeach; endforeach;  ?>
                        <div><strong class="order-total"
                                style="font-size: 20px;"><?php echo  number_format($price) . " ₫"; ?></strong></div>
                                <?php endif; ?>
                    </div>
                </div>
                
				<input type="submit" class="primary-btn order-submit" value="Place order" name="btn-oder" style="margin-left: 130px;">
            </div>
            <!-- /Order Details -->
        </div>
		 </form>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<?php include 'footer.php' ?>