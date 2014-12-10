<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="inventory">
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open_multipart('inventory/add'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
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
                <td><input type="text" name="itemName" value="" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Category<span class="required">*</span></strong></td>
                <td>
                    <select name="category" class="form-control">
                    <?php foreach ($category as $row)
                    {?>
                        <option value="<?php echo $row['categoryID'];?>"><?php echo $row['categoryName'];?></option>
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
                <td><input type="text" name="quantity" value="" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Cost<span class="required">*</span></strong></td>
                <td><input type="text" name="cost" value="" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Retail Price<span class="required">*</span></strong></td>
                <td><input type="text" name="retailPrice" value="" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Low Quantity Reminder</strong></td>
                <td><input type="text" id="lowLimit" name="lowLimit" value="" class="form-control"/></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Vendor</strong></td>
                <td>
                    <select id="vendor_id" name="vendor" class="form-control">
                    <?php foreach ($vendor as $row)
                    {?>
                        <option value="<?php echo $row['vendorID'];?>"><?php echo $row['vendorName'];?></option>
                    <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Image</strong></td>
                <td><input type="file" name="image"/></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td><button type="button" id="back-btn" class="btn btn-default">Back</button></td>
                <td><input type="submit" name="add" value="Add" /></td>
            </tr>
        </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>