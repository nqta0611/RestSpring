<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>My Quarantine Life</title>

	<link rel="icon" href="<?=base_url()?>/images/favicon.ico" type="image/gif">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


	<link rel="stylesheet" type="text/css" href="css/all.css">

	
</head>
<body>
	<div id="header-pan" class="container-fluid row bg-info text-white" >

		<div class="container">
			<div class="row">
				<div class="col-lg-6">		
					<h4>My Quarantine Life Activities</h4>
				</div>

				<div class="col-lg d-flex justify-content-end">		
					<div class="dropdown">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
						 	Activities
						</button>
						<div class="dropdown-menu">
						 	<a class="dropdown-item" href="<?php echo base_url('drink')?>">Water Drinking</a>
						 	<a class="dropdown-item" href="<?php echo base_url('fridge')?>">Open Fridge</a>
						 	<a class="dropdown-item" href="<?php echo base_url('music')?>">Music Player</a>
						 	<a class="dropdown-item" href="<?php echo base_url('general')?>">General</a>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>