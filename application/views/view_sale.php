<?php
    $_list = NULL;
    $i = 1;
    foreach($results as $row){
        $_list .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row['dateAdded'].'</td>
                        <td>'.$row['total'].'</td>
                        <td>'.$row['totalProfit'].'</td>
                        <td><a href="'.base_url().'assets/pdf/sale/'.$row['pdf'].'" target="_blank">[pdf file]</a></td>
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
                <td width="200px">Date & Time</td>
                <td width="150px">Total(RM)</td>
                <td width="150px">Total Profit(RM)</td>
                <td width="100px">PDF</td>
            </tr>
            <?php echo $_list; ?>
        </table>
    </div>
</div>