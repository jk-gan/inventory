<?php
    $_list = NULL;
    $i = 1;
    foreach($result as $row){
        $_list .= '<tr>
                        <td>'.$i.'</td>
                        <td><a href="'.base_url().'users/profile/'.$row['empID'].'">'.$row['name'].'</a></td>
                        <td>'.$row['position'].'</td>
                        <td>'.$row['lastLogin'].'</td> 
                        <td>&nbsp;&nbsp;<a href="'.base_url().'users/edit/'.$row['empID'].'"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="right" title="Edit"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'users/delete/'.$row['empID'].'"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="right" title="Delete"></span></a>
                        </td>
                    </tr>';
$i++;
    }
  
  
?>

<?php echo $header; ?>
<?php echo $breadcrumb; ?>
<input type="hidden" id="menu-id" value="user">
<div class="container-fluid">
    <div class="row-fluid">
        <table width="100%" border="1" cellspacing="1" cellpadding="5" class="table table-hover">
            <tr style="background-color: #eee; font-weight: bold;">
                <td width="10px">#</td>
                <td width="200px">Name</td>
                <td width="200px">Position</td>
                <td width="200px">Last Login</td>
                <td width="100px">Options</td>
            </tr>
            <?php echo $_list; ?>
        </table>
        <a href="<?php echo base_url();?>users/add"><span class="glyphicon glyphicon-plus btn btn-primary">&nbsp;User</span></a>
    </div>
</div>