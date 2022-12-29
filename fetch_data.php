<?php

//fetch_data.php

include('database_connection.php');
    require "./Config/database.php";
	require "./app/models/db.php";
	require "./app/models/products.php";
	require "./app/models/protypes.php";
    $product = new Product;
    $perPage = 6;
    $total = 0;
    $type_filter = implode("','", $_POST["type"]);
if(isset($_POST["action"]))
{
    $pages_filter = implode("','", $_POST["pages"]);
    $total_filter = implode("','", $_POST["total"]);     
    $fistLink = ($pages_filter - 1) * $perPage;
	$query = "
		SELECT * FROM products where type_id IN('".$type_filter."') 
	";
	if(isset($_POST["brand"]))
	{		
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 and menu_id IN('".$brand_filter."')
		";
	}
   
	$query .= "LIMIT $fistLink,$perPage"; 
                                           
    $totalLinks = ceil($total_filter/$perPage);
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{	
		foreach($result as $v)
		{
			$output .= '
			                  	                        
                    <!-- product -->
                    <div class="col-md-4 col-xs-6" style="margin-bottom:50px">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/'.$v['image'].'" alt="" style="width:260px; height:260px;">
                                <div class="product-label">
                                    <span class="sale">-;'.$v['discount'].'%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                
                                <h3 class="product-name"><a
                                        href=" product.php?id='.$v['id'].'"> '.substr($v['name'],0,23).'</a>
                                </h3>
                                <h4 class="product-price">
                                   	'.number_format($v['price'] - $v['price'] *$v['discount'] /100).' ₫
                                    <br><del
                                        class="product-old-price">'.number_format($v['price']) .' ₫</del>
                                </h4>
                               
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><a href=" wishlist.php?id='.  $v['id'].'&&page=productOfprotypes.php&&type_id='.$type_filter.'&&pages='.$pages_filter.'
                                            "><i class="fa fa-heart-o" ></i><span class="tooltipp">add to wishlist</span></a></button>
                                   
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <a href="cart.php?id='.$v['id'].'&&page=productOfprotypes.php&&type_id='.$type_filter.'&&pages='.$pages_filter.'"><button type="submit"
                                        class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                        cart</button></a>                             
                            </div>
                        </div>
                    </div>                               
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>