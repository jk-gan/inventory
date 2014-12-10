<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo $title; ?></title>
    
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

</head>
<body>
	<div id="wrapper">
	    <div class="topbar"><?php $this->load->view('include/top'); ?></div>
	    <?php if($this->session->userdata('admin_logged_in'))
	    {?>
			<div class="sidebar"><?php $this->load->view('include/admin-side'); ?></div> 
	    <?php }
	    else
	    {?>
			<div class="sidebar"><?php $this->load->view('include/side'); ?></div>
	    <?php } ?>
	    
	    <div class="content">
	            <?php $this->load->view($content); ?>
	    </div>
	</div>

	<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>
	<script src="https://www.google.com/jsapi" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/graph.js" type="text/javascript"></script>
</body>
</html>