<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open('order/add'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <table width="600" border="1" cellspacing="1" cellpadding="5" class="table_list">
            <tr>
                <td colspan="2" class="table-title">Order Info</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Order Date<span class="required">*</span></strong></td>
                <td><input type="date" name="orderDate" value="" class="form-control" /></td>
            </tr>
			<!--
            <tr>
                <td width="100"><strong>Description</strong></td>
                <td><input type="text" name="description" value="" class="inputText" /></td>
            </tr>
			-->
            <tr>
                <td width="150" height="34"><strong>Vendor<span class="required">*</span></strong></td>
                <td>
                    <select id="vendor_id" name="vendor" onchange="showUser(this.value)" class="form-control">
                      <option value="">- Choose a vendor -</option>
                      <?php foreach ($vendor as $row)
                      {?>
                          <option value="<?php echo $row['vendorID'];?>"><?php echo $row['vendorName'];?></option>
                      <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%" border="1" cellspacing="2" cellpadding="5" class="table_list">
                <tr>
                    <td width="150" height="34" colspan="2">
                        <strong>Order Item</strong><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr style="background-color: #eee; font-weight: bold; text-align: center;">
                  <td width="250px">Item</td>
                  <td>Quantity</td>
                  <td>Price per unit(RM)</td>
                  <td>Subtotal(RM)</td>
                </tr>
                <tr class="order-row">
                  <td>
                    <select name="item[]" class="form-control item" onchange="showPrice(this.value, this.parentNode.parentNode)">
                        <option value="">Choose an Inventory</option>
                    </select>
                  </td>
                  <td><input class="quantity_r form-control" type="number" name="quantity[]" value="0" onchange="updateSubPrice(this.value, this.parentNode.parentNode)"></td>
                  <td><input class="price_r form-control" type="text" name="price[]" value="0.00" /></td>
                  <td><input class="form-control" type="text" name="subtotal[]" value="0.00"/></td>
                  <input type="hidden" name="arrived[]" value="0">
                </tr>
              </td>
            </tr>
            <tr>
              <td><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
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
                <td width="150" height="34"><strong>Payment Status<span class="required">*</span></strong></td>
                <td width="200">
                    <!-- <input type="radio" name="status" value="paid"> Paid &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="pending"> Pending -->
                    <label class="radio-inline">
                      <input type="radio" name="paymentStatus" value="paid"> Paid
                    </label>
                    <label class="radio-inline"> 
                      <input type="radio" name="paymentStatus" value="pending"> Pending
                    </label>
                </td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Order by</strong></td>
                <td><!-- <input type="text" name="status" value="" class="form-control" /> -->
                <p class="form-control-static"><?php echo $this->session->userdata('name');?></p></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="add" value="Add" /></td>
            </tr>
        </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
