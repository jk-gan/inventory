<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

	<title>User Login</title>
</head>
<body>
<div class="login-body">
	<?php echo form_open('users/login'); ?>
	<div class="container">
	<div class="row">
	<!-- div class="col-lg-4 col-lg-offset-1">
		<p style="color:white; margin-top:200px; font-size: 250%">"The most advance online inventory management system."</p>
	</div> -->
	<div class="col-lg-4 col-lg-offset-4 col-back">
	<div class="col-lg-1 col-lg-offset-4">
	<span id="main-logo" class="glyphicon glyphicon-tower big-logo" data-toggle="tooltip" data-placement="right" title="The most advance inventory management system."></span>
	</div>
    <div class="col-lg-10 col-lg-offset-1" style="margin-top:35px">
	  		<!-- <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> -->
	  		<input type="text" class="flat-input" placeholder="Username" name="username">
		<br/>
	  		<!-- <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span> -->
	  		<input id="password" type="password" class="flat-input" placeholder="Password" name="password">
		<br/>
			<input type="submit" class="login-btn" value="Login" >
</div>
	<?php echo form_close(); ?>
<!-- 		<div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 col-xs-2 col-xs-offset-1">
			<button id="register-btn" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Don't have an account? Click me.">Register</button>
		</div> -->
	</div>
	</div>
	</div>
</div>
</div>

	<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<script type="text/javascript">

	$('document').ready(function(){
		$('#main-logo').tooltip();

		
	});	
		
	$('#username').popover({
		container:'body',
		trigger:'focus',
		title:'Password',
		content:'8-16 characters'
	});


    </script>
</body>
</html>


