<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Service Item Make</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="post" name="addItemMake" action="<?php echo ADMIN_EDIT_ITEM_LINK.$itemId; ?>">                                                                                                                                                                                                                              
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_code">Item Code<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="item_code" value="<?php echo $singleItem['item_code']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_code">Item Make Code
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select class="form-control" name="item_make_code" required="">                                              
                                        <option class="" value="" selected="" disabled=""i>Select Item Make Code</option>       
                                        <?php
                                        if ($result) {
                                            foreach ($result as $row) {
                                                ?>
                                                <option class="" value="<?php echo $row['item_make_code']; ?>" <?php echo set_selected($row['item_make_code'], $singleItem['item_make_code']) ?>><?php echo $row['item_make_code']; ?></option>   
                                                <?php
                                            }
                                        }
                                        ?>                                           
                                    </select>
                                </div>
                            </div>  
                               <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_desc">Description
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <textarea name="item_desc"><?php echo $singleItem['item_desc']; ?></textarea>
                                </div>
                            </div>                                                                                 
                            <div class="ln_solid" style="visibility: hidden"></div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>                       
    </div>
</div>