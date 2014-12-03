<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="inventory">
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open_multipart('inventory/edit'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <input type="hidden" value="<?php echo $inventory[0]['inventoryID'];?>" name="id">
        <table width="500" border="1" cellspacing="1" cellpadding="5" class="table_list">
            <tr>
                <td colspan="2" class="table-title">Inventory Info</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Name<span class="required">*</span></strong></td>
                <td><input type="text" name="itemName" value="<?php echo $inventory[0]['itemName'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Category<span class="required">*</span></strong></td>
                <td>
                    <select name="category" class="form-control">
                    <?php foreach ($category as $row)
                    {?>
                        <?php if($row['categoryID'] == $inventory[0]['categoryID'])
                        {?>
                            <option value="<?php echo $row['categoryID'];?>" selected><?php echo $row['categoryName'];?></option>
                        <?php }
                        else
                        {?>
                            <option value="<?php echo $row['categoryID'];?>"><?php echo $row['categoryName'];?></option>
                        <?php } ?>
                    <?php }?>
                    </select>
                </td>
            </tr>
			<!--
            <tr>
                <td width="100"><strong>Description</strong></td>
                <td><input type="text" name="description" value="" class="inputText" /></td>
            </tr>
			-->
            <tr>
                <td width="150" height="34"><strong>Quantity<span class="required">*</span></strong></td>
                <td><input type="text" name="quantity" value="<?php echo $inventory[0]['quantity'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Cost<span class="required">*</span></strong></td>
                <td><input type="text" name="cost" value="<?php echo $inventory[0]['cost'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Retail Price<span class="required">*</span></strong></td>
                <td><input type="text" name="retailPrice" value="<?php echo $inventory[0]['retailPrice'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Low Quantity Reminder</strong></td>
                <td><input type="text" name="lowLimit" value="<?php echo $inventory[0]['lowLimit'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Vendor</strong></td>
                <td>
                    <select id="vendor_id" name="vendor" class="form-control">
                    <?php foreach ($vendor as $row)
                    {?>
                        <?php if($row['vendorID'] == $inventory[0]['vendorID'])
                        {?>
                            <option value="<?php echo $row['vendorID'];?>" selected><?php echo $row['vendorName'];?></option>
                        <?php }
                        else
                        {?>
                            <option value="<?php echo $row['vendorID'];?>"><?php echo $row['vendorName'];?></option>
                        <?php } ?>
                    <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Image</strong></td>
                <td><input type="file" name="image" value="" class="" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="save" value="Save" /></td>
            </tr>
        </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>