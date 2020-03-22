<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Count Card</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">

	body {
		background-color: #fff;
		font: 13px/20px normal Helvetica, Arial;
		color: #4F5155;
	}
	</style>
</head>
<body>


	<h3>User List: </h3> 

	<table>
		<thead>
			<tr>
			  <th>ID</th>
			  <th>Name</th>
			  <th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($userList as $key => $value) { ?>
			<tr>
				<td>
					<?php echo $value["id"]; ?>
				</td>
				<td>
					<?php echo $value["name"]; ?>
				</td>
				<td>
					<?php echo $value["email"]; ?>
				</td>
			</tr> 
			<?php } ?>
		</tbody>
		</table>

	


	<form id="addUserForm">
		<label for="name">Full Name:</label>
		<input type="text" id="name" name="name"><br><br>
		<label for="email">Email:</label>
		<input type="text" id="email" name="email"><br><br>
		<input type="submit" value="Add user">
	</form> 

<script type="text/javascript"> var $api_url = "<?php echo $this->config_item('api_url'); ?>"; </script>
<script type="text/javascript" src="Js/user.js" ></script>
</body>
</html>