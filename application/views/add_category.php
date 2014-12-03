<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="category">
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open('category/add_category'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <table width="500" border="1" cellspacing="1" cellpadding="5" class="table_list">
            <tr>
                <td colspan="2" class="table-title">Category Info</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Name<span class="required">*</span></strong></td>
                <td><input type="text" name="categoryName" value="" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Description<span class="required">*</span></strong></td>
                <td><textarea rows="4" cols="50" name="description"></textarea></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="add" value="Add" class="btn btn-default"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset!" class="btn btn-danger"></td>
            </tr>
        </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>