<?php
    $_list = NULL;
    $i = 1;
    foreach($results as $row){
        $_list .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row['dateAdded'].'</td>
                        <td>'.$row['total'].'</td>
                        <td>'.$row['totalProfit'].'</td>
                        <td><a href="'.base_url().'assets/pdf/sale/'.$row['pdf'].'" target="_blank"><span class="glyphicon glyphicon-file bigger-icon" data-toggle="tooltip" data-placement="right" title="pdf"></span></a></td>
                    </tr>';
$i++;
    }
  
  
?>

<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="sale">
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
        <?php echo $links;?>
        <br/>
        <a href="<?php echo base_url();?>sale/add_sale"><span class="glyphicon glyphicon-plus btn btn-primary">&nbsp;New</span></a>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <select id="month-graph" onchange="drawChart()">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11" selected>November</option>
            <option value="12">December</option>
        </select>

        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

    </div>
</div>