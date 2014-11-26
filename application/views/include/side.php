<ul id="sidemenu">
    <a href="<?php echo base_url(); ?>home" class="nav-header"><li>Home</li></a>

    <a href="#inventory-menu" class="nav-header" data-toggle="collapse"><li>Inventory <span class="glyphicon glyphicon-chevron-down"></span></li></a>
    <ul id="inventory-menu" class="collapse in">
        <a href="<?php echo base_url();?>category/all_category" class="nav-content"><li>Category List</li></a>
        <a href="<?php echo base_url();?>inventory" class="nav-content"><li>Inventory List</li></a>
        <a href="<?php echo base_url();?>inventory/add" class="nav-content"><li>Add Inventory</li></a>
    </ul>


    <a href="#orders-menu" class="nav-header" data-toggle="collapse"><li>Orders <span class="glyphicon glyphicon-chevron-down"></span></li></a>
    <ul id="orders-menu" class="collapse in">
        <a href="<?php echo base_url();?>order" class="nav-content"><li>Orders List</li></a>
        <a href="<?php echo base_url();?>order/add" class="nav-content"><li>Add Order</li></a>
    </ul>

    <a href="#sales-menu" class="nav-header" data-toggle="collapse"><li>Sales <span class="glyphicon glyphicon-chevron-down"></span></li></a>
    <ul id="sales-menu" class="collapse in">
        <a href="#" class="nav-content"><li>Sales List</li></a>
        <a href="<?php echo base_url();?>sale/add_sale" class="nav-content"><li>Add Sale</li></a>
    </ul>

    <a href="#vendor-menu" class="nav-header" data-toggle="collapse"><li>Vendor <span class="glyphicon glyphicon-chevron-down"></span></li></a>
    <ul id="vendor-menu" class="collapse in">
        <a href="<?php echo base_url();?>vendor" class="nav-content"><li>Vendor List</li></a>
        <a href="<?php echo base_url();?>vendor/add" class="nav-content"><li>Add Vendor</li></a>
    </ul>

  <!--   <li><a href="#">Ex-Wallet</a></li>
    <li><a href="#">Wallet Transfer</a></li>
    <li><a href="#">Registration</a></li>
    <li><a href="#">Client List</a></li>
    <li><a href="#">Placement View</a></li>
    <li><a href="#">Resource</a></li> -->
    <a href="<?php echo base_url(); ?>users/logout" class="nav-header"><li>Logout</li></a>
</ul>