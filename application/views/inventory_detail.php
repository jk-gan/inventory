<div class="row">
	<div class="detail">
		<div class="first-col">
    		<div class="crop">
      			<img src="<?php echo base_url();?>/assets/img/inventory/<?php echo $inventory[0]['image'];?>" class="img-responsive" alt="...">
    		</div>
    	</div>
    	<div class="second-col">
    		<div class="item-name">
    			<h1><?php echo $inventory[0]['itemName'];?></h1>
    		</div>
    		<div class="info">
    			<table>
    				<tr>
    					<td>Category </td>
    					<td>: <?php echo $inventory[0]['categoryName'];?></td>
    				</tr>
    				<tr>
    					<td>Quantity  </td>
    					<td>: <?php echo $inventory[0]['quantity'];?></td>
    				</tr>
    				<tr>
    					<td>Cost / unit </td>
    					<td>: RM <?php echo $inventory[0]['cost'];?></td>
    				</tr>
    				<tr>
    					<td>Retail Price / unit </td>
    					<td>: RM <?php echo $inventory[0]['retailPrice'];?></td>
    				</tr>
    				<tr>
    					<td>Profit / unit </td>
    					<td>: RM <?php echo $inventory[0]['profit'];?></td>
    				</tr>
    				<tr>
    					<td>Date Added </td>
    					<td>: <?php echo $inventory[0]['dateAdded'];?></td>
    				</tr>
    				<tr>
    					<td>Vendor </td>
    					<td>: <?php echo $inventory[0]['vendorName'];?></td>
    				</tr>
    			</table>
    		</div>
    	</div>
    	<div class="back-btn">
    		<button type="button" id="back-btn" class="btn btn-default">Back</button>
    		<a href="<?php echo base_url();?>inventory/edit/<?php echo $inventory[0]['inventoryID'];?>"><button type="button" class="btn btn-default">Edit</button>
    	</div>
    </div>
</div>