<?php

$item    = unserialize($order[0]['itemName']);
$quantity    = unserialize($order[0]['quantity']);
$id         = unserialize($order[0]['item']);
$arrived    = unserialize($order[0]['arrived']);
$item_rows  = NULL;

for($i = 0; $i < sizeof($id); $i++ )
{
      $item_rows .= "<tr class='item-row' style='text-align: center'>
              <td>
                  <p class='form-control-static'>".$item[$i]."</p>
              </td>
              <td>
                  <p class='form-control-static'>".$quantity[$i]."</p>
              </td>";
  if($arrived[$i] == '0')
  {             
      $item_rows .= "<td>
                <input type='checkbox' name='check[]' value='".$id[$i]."'>
              </td>
            </tr>";
  }
  else
  {
    $item_rows .= "<td>
                  <span class='glyphicon glyphicon-ok'></span>
                  </td>
                  </tr>";
  }
     
}

?>


<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="order">
<div class="container-fluid">
    <div class="row-fluid">
        
        
        <?php echo form_open('order/check'); ?>
        <?php echo validation_errors();?>
        <div class="input-group">
        <input type="hidden" name="id" value="<?php echo $order[0]['orderID'];?>">
        <table width="600" border="1" cellspacing="1" cellpadding="5" class="table_list">
            <tr>
                <td colspan="2" class="table-title">Order Info</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="150" height="34"><strong>Order Date</strong></td>
                <td><p class="form-control-static"><?php echo $order[0]['orderDate'];?></p></td>
            </tr>
			<!--
            <tr>
                <td width="100"><strong>Description</strong></td>
                <td><input type="text" name="description" value="" class="inputText" /></td>
            </tr>
			-->
            <tr>
                <td width="150" height="34"><strong>Vendor</strong></td>
                <td>
                  <p class="form-control-static"><?php echo $order[0]['vendorName'];?></p>
                </td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%" border="1" cellspacing="2" cellpadding="5" class="table_list">
                <tr>
                    <td width="150" height="34" colspan="2">
                        <strong>Order Item</strong>
                    </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr style="background-color: #eee; font-weight: bold; text-align: center;">
                  <td>Item</td>
                  <td>Quantity</td>
                  <td></td>
                </tr>
                <tr class="item-row">
                  <td>
                    <?php echo $item_rows;?>
                  </td>
                </tr>
              </td>
            </tr>
            <!-- <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td width="150" height="34"><strong>Total</strong></td>
              <td><p class="form-control-static"><?php echo $order[0]['total'];?></td>
            </tr> -->
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            
            <!--  -->
            <!-- <tr>
                <td width="150" height="34"><strong>Order by</strong></td>
                <td><input type="text" name="status" value="" class="form-control" />
                <p class="form-control-static"></p></td>
            </tr> -->
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
