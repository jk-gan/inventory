<?php
    $_list = NULL;
    $i = 1;
    foreach($results as $row){
        $_list .= '<tr>
                        <td>'.$i.'</td>
                        <td><a href="'.base_url().'inventory/view/'.$row['inventoryID'].'">'.$row['itemName'].'</a></td>
                        <td>'.$row['quantity'].'</td>
                        <td>'.$row['cost'].'</td>
                        <td>'.$row['retailPrice'].'</td>
                        <td>'.$row['profit'].'</td>
                        <td>'.$row['categoryName'].'</td>
                        <td>&nbsp;&nbsp;<a href="'.base_url().'inventory/edit/'.$row['inventoryID'].'"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="right" title="Edit"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'inventory/delete/'.$row['inventoryID'].'"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="right" title="Delete"></span></a>
                        </td>
                    </tr>';
$i++;
    }
  
  
?>

<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="inventory">
<div class="container-fluid">
    <div class="row-fluid">
        <table width="100%" border="1" cellspacing="1" cellpadding="5" class="table table-hover">
            <tr style="background-color: #eee; font-weight: bold;">
                <td width="10px">#</td>
                <td width="200px">Name</td>
                <td width="100px">Quantity</td>
                <td width="100px">Cost</td>
                <td width="100px">Retail Price</td>
                <td width="130px">Profit per unit</td>
                <td width="100px">Category</td>
                <td width="100px">Option</td>
            </tr>
            <?php echo $_list; ?>
        </table>
        <?php echo $links;?>
    </div>
</div>