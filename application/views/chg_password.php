<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="user">
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open('employee/new_user'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <table width="500" border="1" cellspacing="1" cellpadding="5" class="table_list">
            <tr>
                <td colspan="2" class="table-title">Change New Password</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>New Password<span class="required">*</span></strong></td>
                <td><input type="password" name="password" value="" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Confirm Password<span class="required">*</span></strong></td>
                <td><input type="password" name="con_pass" value="" class="form-control" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="done" value="Done" class="btn btn-default"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset!" class="btn btn-danger"></td>
            </tr>
        </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>