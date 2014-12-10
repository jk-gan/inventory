<?php
    $_list = NULL;
    $i = 1;
    foreach($result as $row){
        $_list .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row['orderDate'].'</td>
                        <td>'.$row['vendorName'].'</td>
                        <td>'.$row['orderStatus'].'</td>
                        <td>'.$row['paymentStatus'].'</td>
                        <td><a href="'.base_url().'order/check/'.$row['orderID'].'">[check]</td>
                        <td><a href="'.base_url().'assets/pdf/order/'.$row['pdf'].'" target="_blank"><span class="glyphicon glyphicon-file bigger-icon" data-toggle="tooltip" data-placement="right" title="pdf"></span></a></td>
                    </tr>';
        $i++;    
    }
?>

<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="order">
<div class="container-fluid">
    <div class="row-fluid">
        <table width="100%" border="1" cellspacing="1" cellpadding="5" class="table table-hover">
            <tr style="background-color: #eee; font-weight: bold;">
                <td width="10px">#</td>
                <td width="110px">Order Date</td>
                <td width="100px">Vendor</td>
                <td width="150px">Order Status</td>
                <td width="150px">Payment Status</td>
                <td width="60px">Check</td>
                <td width="60px">PDF</td>
            </tr>
            <?php echo $_list; ?>
        </table>
        <a href="<?php echo base_url();?>order/add"><span class="glyphicon glyphicon-plus btn btn-primary">&nbsp;New</span></a>
    </div>
</div>