<?php
 include 'header.php' ?>
<?php   
	require "./app/models/manufactures .php";
	if(isset($_GET['type_id']))
	{
		$id = $_GET['type_id'];
	}
	$manufactures = new Manufactures;
	$getProtypeById = $product->getProtypeById($id);
	$getAllManufactures = $manufactures->getAllManufactures(); 
    
    $perPage = 6;
    $pages = $_GET['pages'];
    $total = 0;
    foreach($getProtypeById as $v){
        foreach($getAllProtypes as $va)
        {
            if($v['type_id'] == $va['type_id'] )
            {
                $total++;
            }
        }
    }                                                        
    $totalLinks = ceil($total/$perPage);
    $url = $_SERVER['PHP_SELF'];
    $getProtypeByIdPage = $product->getProtypeByIdPage($pages,$perPage,$id);
    $paginateOftype = $product->paginateOftype($url,$total,$pages,$perPage,1,$id);
    ?>

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
                            <div class="input-checkbox">
                                <input class="common_selector brand" type="checkbox" id="<?php echo $v['manu_name']?>"
                                    value="<?php echo $v['manu_id']?>">
                                <label for="<?php echo $v['manu_name'] ?>">
                                    <span></span>
                                    <?php echo $v['manu_name'] ?>
                                    <input type="checkbox" class="common_selector type_id" value="<?php echo $id ?>">
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
                        </div>
                        <div class="checkbox-filter">
                            <input class="common_selector type" type="hidden" id="<?php echo $_GET['type_id'] ?>"
                                value="<?php echo $_GET['type_id']?>">
                        </div>
                        <div class="checkbox-filter">
                            <input class="common_selector pages" type="hidden" id="<?php echo $_GET['pages'] ?>"
                                value="<?php echo $_GET['pages']?>">
                        </div>
                        <div class="checkbox-filter">
                            <input class="common_selector total" type="hidden" id="<?php echo $total ?>"
                                value="<?php echo $total?>">
                        </div>
                        <div class="checkbox-filter">
                            <input class="common_selector url" type="hidden" id="<?php echo $url ?>"
                                value="<?php echo $url?>">
                        </div>
                    </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9 ">

                <!-- store top filter -->
                <div class="row filter_data">

                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="store-filter clearfix filter_data2">
                  
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<style>
#loading {
    text-align: center;
    background: url('loader.gif') no-repeat center;
    height: 150px;
}
</style>
<script src="./js/filter.js">

</script>

<script src="./js/filter2.js">
</script>
<!-- /SECTION -->

<?php include 'footer.php' ?>