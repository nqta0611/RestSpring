<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>My Quarantine Life</title>
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/gif">
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

	<h3>Add Drink</h3>
	<span>
		<span>
			<input placeholder="Amount" id="amount" type="number" step="1" min="0.1">
			<select id="unit">
			  <option value="ml">Milliliter</option>
			  <option value="oz">Oz</option>
			  <option value="sp">Sip</option>
			</select>
		</span>
		<button id="btnAddDrink">Add drink</button> <br>
		<p id="errorMessage"></p>
	</span>

	
	<script type="text/javascript"> var api_url = "<?php echo $this->config->item('api_url');?>"; </script>
	<script type="text/javascript" src="js/drink.js" ></script>

</body>
</html>