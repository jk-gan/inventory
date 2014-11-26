<?php
    $_list = NULL;
    $i = 1;
    foreach($result as $row){
        $_list .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$row['categoryName'].'</td>
                        <td>'.$row['description'].'</td>
                        <td>&nbsp;&nbsp;<a href="'.base_url().'category/edit/'.$row['categoryID'].'"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="right" title="Edit"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'category/delete/'.$row['categoryID'].'"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="right" title="Delete"></span></a>
                        </td>
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
                <td width="200px">Name</td>
                <td width="400px">Description</td>
                <td width="100px">Option</td>
            </tr>
            <?php echo $_list; ?>
        </table>
        <a href="<?php echo base_url();?>category/add_category"><span class="glyphicon glyphicon-plus btn btn-primary">&nbsp;New</span></a>
    </div>
</div>