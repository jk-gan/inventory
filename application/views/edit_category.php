<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open('category/edit'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <input type="hidden" value="<?php echo $category[0]['categoryID'];?>" name="id">
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
                <td><input type="text" name="categoryName" value="<?php echo $category[0]['categoryName'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Description<span class="required">*</span></strong></td>
                <td><textarea rows="4" cols="50" name="description"><?php echo $category[0]['description'];?></textarea></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="edit" value="Edit" /></td>
            </tr>
        </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>