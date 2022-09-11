<div class="form-group">
    <!-- form-group Begin -->

    <label class="col-md-3 control-label"> Select Product </label>

    <div class="col-md-6">
        <!-- col-md-6 Begin -->

        <select name="product_id" class="form-control">
            <option value="Select Product For Coupon"></option>

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