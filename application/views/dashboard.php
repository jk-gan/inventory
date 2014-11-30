<?php
    $_list = NULL;
    $i = 1;
    foreach($vendors as $vendor)
    {
        foreach($$vendor['vendorName'] as $row)
        {
            $_list .= '<tr>
                            <td>'.$i.'</td>
                            <td>'.$row['itemName'].'</td>
                            <td>'.$row['quantity'].'</td>
                            <td>'.$row['lowLimit'].'</td>
                            <td>&nbsp;&nbsp;<a href="'.base_url().'order/lowlimit/'.$row['vendorID'].'"><span class="glyphicon glyphicon-shopping-cart bigger-icon" data-toggle="tooltip" data-placement="right" title="Order"></span></a>
                            </td>
                        </tr>';
            $i++;
        }
    }

    
?>

<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<div class="container-fluid">
    <div class="row-fluid">
    <p>These items are in low limit : </p>
        <table width="100%" border="1" cellspacing="1" cellpadding="5" class="table table-hover">
            <tr style="background-color: #eee; font-weight: bold;">
                <td width="10px">#</td>
                <td width="200px">Name</td>
                <td width="100px">Quantity</td>
                <td width="100px">LowLimit</td>
                <td width="100px">Order</td>
            </tr>
            <?php echo $_list; ?>
        </table>
    </div>
</div>