<?php

//fetch_data.php

include('database_connection.php');
    require "./Config/database.php";
	require "./app/models/db.php";
	require "./app/models/products.php";
	require "./app/models/protypes.php";
    $product = new Product;
    $perPage = 6;
    $type_filter = implode("','", $_POST["type"]);
if(isset($_POST["action"]))
{	
	
	$pages_filter = implode("','", $_POST["pages"]);
    $total_filter = implode("','", $_POST["total"]); 
	$url_filter = implode("','", $_POST["url"]); 
	$totalLinks = ceil($total_filter/$perPage);
    if(isset($_POST["brand"]))
    {	
		$brand_filter = implode("','", $_POST["brand"]);
        $paginateOfmanu = $product->paginateOfmanu($url_filter,$total_filter,$pages_filter,$perPage,1,$type_filter,$brand_filter);
    }
	else
	{
		$paginateOfmanu = $product->paginateOftype($url_filter,$total_filter,$pages_filter,$perPage,1,$type_filter);
	}
	$output = '';				
			$output .= '		                  	                                         
                    <ul class="store-pagination">';
                        if($pages_filter > 1)
                        {
                            $prev_page = $pages_filter - 1 ;
                           $output .= '<li><a href=productOfprotypes?type_id='.$type_filter.'?&&pages='.$prev_page.'><i class="fa fa-angle-left"></i></a></li>';
                          
                        }
                        	$paginateOfmanu;
                        if($pages_filter < $totalLinks - 1)
                        {
                            $next_page = $pages_filter + 1;
                            $output .= '<li><a
                            href=productOfprotypes?type_id='.$type_filter.'?&&pages='.$next_page.'><i
                            class="fa fa-angle-right"></i></a></li> ';   
                        }                                                                                   
                        $output .=' </ul>
			';		
	echo $output;
}

?>