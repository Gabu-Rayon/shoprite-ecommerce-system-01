<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Coupons </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Coupons
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-pencil fa-fw"></i> Insert Coupon
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Coupon Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_price" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Limit</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_limit" type="number" class="form-control" value="0" >
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group">
    <!-- form-group Begin -->

    <label class="col-md-3 control-label"> Select Product </label>

    <div class="col-md-6">
        <!-- col-md-6 Begin -->

        <select name="product_id" class="form-control" required>
            <option selected disabled>Select Product For Coupon</option>

            <?php
             $get_all_p = "SELECT * FROM products";
             $run_all_p = mysqli_query($con,$get_all_p);
                                 
             while($row_p = mysqli_fetch_array($run_all_p)){

             $p_id = $row_p['product_id'];
             $p_title = $row_p['product_title'];

             echo "<option value='$p_id'> $p_title </option>";
            
            }
            
            ?>
        </select>

    </div><!-- col-md-6 Finish -->

</div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Code </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input nname="coupon_code" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Create Coupon" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $coupon_title = $_POST['coupon_title'];
    $coupon_price = $_POST['coupon_price'];
    $coupon_limit = $_POST['coupon_limit'];
    $coupon_code= $_POST['coupon_code'];
    
    $insert_coupon = "INSERT  INTO coupons (coupon_title,coupon_price,coupon_limit,coupon_code) VALUES
     ('$coupon_title','$coupon_price','$coupon_limit','$coupon_code')";
    
    $run_coupon = mysqli_query($con,$insert_coupon);
    
    if($run_coupon){
        
        echo "<script>alert('Coupon has been inserted sucessfully')</script>";
        echo "<script>window.open('index.php?view_coupons','_self')</script>";
        
    }
    
}

?>


<?php } ?>