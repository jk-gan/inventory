<input type="hidden" id="menu-id" value="user">
<div class="row">
	<div class="detail">
		<div class="first-col">
    	<!-- 	<div class="crop">
      			<img src="<?php echo base_url();?>/assets/img/inventory/<?php echo $inventory[0]['image'];?>" class="img-responsive" alt="...">
    		</div> -->
    	</div>
    	<div class="second-col">
    		<div class="item-name">
    			<h1><?php echo $employee[0]['name'];?></h1>
    		</div>
    		<div class="info">
    			<table>
                    <tr>
                        <td>Gender </td>
                        <td>: <?php echo $employee[0]['gender'];?></td>
                    </tr>
                    <tr>
                        <td>Position </td>
                        <td>: <?php echo $employee[0]['position'];?></td>
                    </tr>
    				<tr>
    					<td>Age </td>
    					<td>: <?php echo $employee[0]['age'];?></td>
    				</tr>
    				<tr>
    					<td>IC No. </td>
    					<td>: <?php echo $employee[0]['IC'];?></td>
    				</tr>
    				<tr>
    					<td>Handphone </td>
    					<td>: <?php echo $employee[0]['Hp'];?></td>
    				</tr>
    				<tr>
    					<td>Address </td>
    					<td>: <?php echo $employee[0]['address'];?></td>
    				</tr>
    				<tr>
    					<td>Email </td>
    					<td>: <?php echo $employee[0]['email'];?></td>
    				</tr>
    			<!-- 	<tr>
    					<td>Date Added </td>
    					<td>: <?php echo $inventory[0]['dateAdded'];?></td>
    				</tr> -->
    			</table>
    		</div>
    	</div>
    	<div class="back-btn">
    		<button type="button" id="back-btn" class="btn btn-default">Back</button>
    		<a href="<?php echo base_url();?>users/edit/<?php echo $employee[0]['empID'];?>"><button type="button" class="btn btn-default">Edit</button>
    	</div>
    </div>
</div>