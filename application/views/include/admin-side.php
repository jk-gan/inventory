<ul id="sidemenu">
    
     <li class="actived">
        <a href="<?php echo base_url(); ?>home">
            <span class="icon glyphicon glyphicon-home"></span>
            <span class="text">Home</span>
        </a>
     </li>

     <li id="user">
        <a href="<?php echo base_url();?>users/all">
            <span class="icon glyphicon glyphicon-user"></span>
            <span class="text">User</span>
        </a>
     </li>

     <li id="category">
        <a href="<?php echo base_url();?>category/all_category">
            <span class="icon glyphicon glyphicon-tags"></span>
            <span class="text">Category</span>
        </a>
     </li>



     <li id="inventory">
     <a href="<?php echo base_url();?>inventory" class="nav-header">
        <span class="icon glyphicon glyphicon-book"></span>
        <span class="text">Inventory</span>
        </a>
     </li>


     <li id="order">
     <a href="<?php echo base_url();?>order" class="nav-header">
        <span class="icon glyphicon glyphicon-list-alt"></span>
        <span class="text">Order</span>
        </a>
     </li>


     <li id="sale">
     <a href="<?php echo base_url();?>sale/all" class="nav-header">
        <span class="icon glyphicon glyphicon-barcode"></span>
        <span class="text">Sale</span>
        </a>
     </li>


     <li id="vendor">
     <a href="<?php echo base_url();?>vendor" class="nav-header">
        <span class="icon glyphicon glyphicon-user"></span>
        <span class="text">Vendor</span>
        </a>
     </li>
    <li>
        <a href="<?php echo base_url(); ?>users/logout" class="nav-header">
        <span class="glyphicon glyphicon-share-alt"></span>
        <span class="text">Logout</span>
        </a>
    </li>
</ul>