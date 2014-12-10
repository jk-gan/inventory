<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="sale">
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open('sale/add_sale'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <table width="600" border="1" cellspacing="1" cellpadding="5" class="table_list">
            <tr>
                <td colspan="2" class="table-title">Sell Info</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
			<!--
            <tr>
                <td width="100"><strong>Description</strong></td>
                <td><input type="text" name="description" value="" class="inputText" /></td>
            </tr>
			-->
            <tr>
              <td colspan="2"><table width="100%" border="1" cellspacing="2" cellpadding="5" class="table_list">
                <tr>
                    <td width="150" height="34" colspan="2">
                        <strong>Item</strong><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr style="background-color: #eee; font-weight: bold; text-align: center;">
                  <td width="250px">Item</td>
                  <td width="100px">Quantity</td>
                  <td>Price per unit(RM)</td>
                  <td>Subtotal(RM)</td>
                </tr>
                <tr class="sales-row">
                  <td>
                    <select name="item[]" class="form-control sale-item" onchange="showRetailPrice(this.value, this.parentNode.parentNode)">
                        <option value="">Choose an Inventory</option>
                      <?php foreach ($item as $row)
                      {?>
                          <option value="<?php echo $row['inventoryID'];?>"><?php echo $row['itemName'];?></option>
                      <?php }?>
                    </select>
                  </td>
                  <td><input class="quantity_r form-control" type="number" min="0" name="quantity[]" value="0" onchange="updateSubPrice(this.value, this.parentNode.parentNode)"></td>
                  <td><input class="price_r form-control" type="text" name="price[]" value="0.00" /></td>
                  <td><input class="form-control" type="text" name="subtotal[]" value="0.00"/></td>
                </tr>
              </td>
            </tr>
            <tr>
              <td><a id="addsalerow" href="javascript:;" title="Add a row">Add a row</a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td width="150" height="34"><strong>Total (RM)</strong></td>
              <td><input type="text" name="total" id="total" value="0.00" class="form-control" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>By</strong></td>
                <td><!-- <input type="text" name="status" value="" class="form-control" /> -->
                <p class="form-control-static"><?php echo $this->session->userdata('name');?></p></td>
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
