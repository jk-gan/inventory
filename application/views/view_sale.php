<?php
    $_list = NULL;
    $i = 1;
    foreach($results as $row){
        $_list .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row['itemName'].'</td>
                        <td>'.$row['quantity'].'</td>
                        <td>'.$row['retailPrice'].'</td>
                        <td>'.$row['profit'].'</td>
                        <td>'.$row['categoryName'].'</td>
                    </tr>';
$i++;
    }
  
  
?>

<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<div class="container-fluid">
    <div class="row-fluid">
        <table width="100%" border="1" cellspacing="1" cellpadding="5" class="table table-hover">
            <tr style="background-color: #eee; font-weight: bold;">
                <td width="10px">#</td>
                <td width="200px">Item</td>
                <td width="100px">Quantity</td>
                <td width="100px">Retail Price</td>
                <td width="130px">Profit per unit</td>
                <td width="100px">Category</td>
            </tr>
            <?php echo $_list; ?>
        </table>
        <?php echo $links;?>
    </div>
</div>