<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="user">
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open('users/add'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <table width="500" border="1" cellspacing="1" cellpadding="5" class="table_list">
            <tr>
                <td colspan="2" class="table-title">Employee Info</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Name<span class="required">*</span></strong></td>
                <td><input type="text" name="name" value="" class="form-control" /></td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Position<span class="required">*</span></strong></td>
                <td>
                    <label class="radio-inline">
                      <input type="radio" name="position" value="staff" checked="checked"> Staff
                    </label>
                    <label class="radio-inline"> 
                      <input type="radio" name="position" value="manager"> Manager
                    </label>
                </td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Username<span class="required">*</span></strong></td>
                <td><input type="text" name="username" class="form-control"></td>
            </tr>
			<!--
            <tr>
                <td width="100"><strong>Description</strong></td>
                <td><input type="text" name="description" value="" class="inputText" /></td>
            </tr>
			-->
            <tr>
                <td width="150" height="34"><strong>Password<span class="required">*</span></strong></td>
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
                <td><button type="button" id="back-btn" class="btn btn-default">Back</button></td>
                <td><input type="submit" name="add" value="Add" class="btn btn-default"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset!" class="btn btn-danger"></td>
            </tr>
        </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>