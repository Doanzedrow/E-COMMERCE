<?php include './header.php';
include './sidenar.php';
if(isset($_GET['id'])):
    $id=$_GET['id'];
    $p=$product->getProductById($id);
   
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="edit.php" method="Post" enctype="multipart/form-data">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="hidden" name="id" value="<?php echo $p[0]['id']?>">
                                <input value="<?php echo $p[0]['name']?>" name="name" type="text" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">price</label>
                                <input value="<?php echo $p[0]['price']?>" name="price" type="text" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Image</label>
                                <input name="image" type="file" id="inputName" class="form-control">
                                <img style = "width:150px; heigth:40px" src="../img/<?php echo $p[0]['image']?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name ="description" id="inputDescription" class="form-control" row="4"><?php echo $p[0]['description']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Manufactures</label>
                                <select name="manu_id" id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <?php $getAllManufactures  = $manufacture->getAllManufactures();
                                foreach($getAllManufactures as $va):
                                    if($va['manu_id']==$p[0]['menu_id']):?>
                                        <option selected value="<?php echo $va['manu_id'] ?>"><?php echo $va['manu_name'] ?></option>
                                        <?php
                                        else:
                                ?>
                                <option value="<?php echo $va['manu_id'] ?>"><?php echo $va['manu_name'] ?></option>
                                <?php endif; endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Protype</label>
                                <select name="type_id" id="inputStatus" class="form-control custom-select">
                               
                                <option selected disabled>Select one</option>
                                <?php $getAllProtypes  = $protype->getAllProtypes();
                                foreach($getAllProtypes as $va):
                                    if($va['type_id']==$p[0]['type_id']):?>
                                         <option selected value="<?php echo $va['type_id'] ?>"><?php echo $va['type_name'] ?></option>
                                         <?php
                                         else:

                                ?>
                                <option value="<?php echo $va['type_id'] ?>"><?php echo $va['type_name'] ?></option>
                                <?php endif; endforeach; ?>
                                </select>
                            </div>                          
                            <div class="form-group">
                                <label for="inputClientCompany">Feature</label>
                                <?php
                                if($p[0]['feature']==1):?>
                                <input checked name="feature" type="checkbox" id="inputClientCompany" class="form-control" row="4"></input>
                                <?php
                                else:
                                ?>
                                    <input  name="feature" type="checkbox" id="inputClientCompany" class="form-control" row="4"></input>
                                <?php endif?>
                            </div>

                               <!--  -->
                            <div class="form-group">
                                <label for="inputdiscount">Discount</label>
                                <input value="<?php echo $p[0]['discount']?>" name="discount" type="text" id="inputdiscount" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputqty_sold">Qty_sold</label>
                                <input value="<?php echo $p[0]['qty_sold']?>" name="qty_sold" type="text" id="inputqty_sold" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputkichthuocmanhinh">Kichthuocmanhinh</label>
                                <input  value="<?php echo $p[0]['kichthuocmanhinh']?>" name="kichthuocmanhinh" type="text" id="inputkichthuocmanhinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputchip">Chip</label>
                                <input  value="<?php echo $p[0]['chip']?>" name="chip" type="text" id="inputchip" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputRam">Ram</label>
                                <input value="<?php echo $p[0]['ram']?>" name="ram" type="text" id="inputRam" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputRom">Rom</label>
                                <input  value="<?php echo $p[0]['rom']?>" name="rom" type="text" id="inputRom" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputpin">Pin</label>
                                <input  value="<?php echo $p[0]['pin']?>" name="pin" type="text" id="inputpin" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputdophangiai">Dophangiai</label>
                                <input  value="<?php echo $p[0]['dophangiai']?>" name="dophangiai" type="text" id="inputdophangiai" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputcongketnoi">Congketnoi</label>
                                <input  value="<?php echo $p[0]['congketnoi']?>"  name="congketnoi" type="text" id="inputcongketnoi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputcongsuat">Congsuat</label>
                                <input value="<?php echo $p[0]['congsuat']?>" name="congsuat" type="text" id="inputcongsuat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputhedieuhanh">Hedieuhanh</label>
                                <input value="<?php echo $p[0]['hedieuhanh']?>" name="hedieuhanh" type="text" id="inputhedieuhanh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputcard">Card</label>
                                <input value="<?php echo $p[0]['card']?>" name="card" type="text" id="inputcard" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                    </div>
                </div>

        </section>
    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php endif; ?>
<?php include './footer.php' ?>