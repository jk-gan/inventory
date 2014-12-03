<?php
    $_list = NULL;
    $i = 1;
    foreach($result as $row){
        $_list .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row['vendorName'].'</td>
                        <td>'.$row['hp'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['address'].'</td>
                        <td>&nbsp;&nbsp;<a href="'.base_url().'vendor/edit/'.$row['vendorID'].'"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="right" title="Edit"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'vendor/delete/'.$row['vendorID'].'"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="right" title="Delete"></span></a>
                        </td>
                    </tr>';
$i++;
    }
  
  
?>

<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="vendor">
<div class="container-fluid">
    <div class="row-fluid">

        <table width="100%" border="1" cellspacing="1" cellpadding="5" class="table table-hover">
            <tr style="background-color: #eee; font-weight: bold;">
                <td width="10px">#</td>
                <td width="50px">Name</td>
                <td width="130px">Handphone no.</td>
                <td width="200px">Email</td>
                <td width="200px">Address</td>
                <td width="100px">Option</td>
            </tr>
            <?php echo $_list; ?>
        </table>
    </div>
</div>