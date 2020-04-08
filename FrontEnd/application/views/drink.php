<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>My Quarantine Life</title>
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


	<h3>Water drinking history </h3> 

	<table>
		<thead>
			<tr>
			  <th>ID</th>
			  <th>Time</th>
			  <th>Amount</th>
			  <th>Unit</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($drinkList as $key => $value) { ?>
			<tr>
				<td>
					<?php echo $value["id"]; ?>
				</td>
				<td>
					<?php echo $value["timestamp"]; ?>
				</td>
				<td>
					<?php echo $value["amount"]; ?>
				</td>
				<td>
					<?php echo $value["unit"]; ?>
				</td>
			</tr> 
			<?php } ?>
		</tbody>
		</table>

<script type="text/javascript"> var $api_url = "<?php echo $this->config_item('api_url'); ?>"; </script>
</body>
</html>