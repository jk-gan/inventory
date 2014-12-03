<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="vendor">
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open('vendor/edit'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <input type="hidden" value="<?php echo $vendor[0]['vendorID'];?>" name="id">
        <table width="500" border="1" cellspacing="1" cellpadding="5" class="table_list">
            <tr>
                <td colspan="2" class="table-title">Vendor Info</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Name<span class="required">*</span></strong></td>
                <td><input type="text" name="name" value="<?php echo $vendor[0]['vendorName'];?>" class="form-control" /></td>
            </tr>
			<!--
            <tr>
                <td width="100"><strong>Description</strong></td>
                <td><input type="text" name="description" value="" class="inputText" /></td>
            </tr>
			-->
            <tr>
                <td width="150" height="34"><strong>Handphone no.<span class="required">*</span></strong></td>
                <td><input type="text" name="hp" value="<?php echo $vendor[0]['hp'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Email<span class="required">*</span></strong></td>
                <td><input type="email" name="email" value="<?php echo $vendor[0]['email'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Address<span class="required">*</span></strong></td>
                <td><input type="text" name="address" value="<?php echo $vendor[0]['address'];?>" class="form-control" /></td>
            </tr>
            <!-- <tr>
                <td width="150" height="34"><strong>Status<span class="required">*</span></strong></td>
                <td><input type="text" name="status" value="<?php echo $vendor[0]['status'];?>" class="form-control" /></td>
            </tr> -->
			<tr>
                <td width="150" height="34"><strong>Contacted by<span class="required">*</span></strong></td>
                <td>
                    <select name="empID">
                    <?php foreach ($emp as $row)
                    {?>
                        <option value="<?php echo $row['empID'];?>"><?php echo $row['name'];?></option>
                    <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="save" value="Save" class="btn" /></td>
            </tr>
        </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
