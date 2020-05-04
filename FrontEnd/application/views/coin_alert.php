<div class="container" style="margin-bottom: 110px;">
	
	<div class="d-flex bg-light text-dark shadow p-3 mb-2 rounded">
		<div class="p-2 flex-shrink-0" style="width:75px; 
				background-image: url(https://s3.us-east-2.amazonaws.com/nomics-api/static/images/currencies/btc.svg); 
				background-repeat: no-repeat;">	
		</div>
		<div class="p-2 w-100">
			<h4>Coin Watch</h4>
		</div>
		<div class="p-2 flex-shrink-0">
	  		<div id="btc-cur-price" class="text-success text-monospace font-weight-bold  text-success"></div>
	  		<div id="btc-cur-price-time" class="font-italic"></div>
	  	</div>
	  	<div class="p-2 flex-shrink-0">
	  		<button id="btc-update-button" class="btn btn-warning">
	  			<span id="btc-update-button-txt">Update</span>
	  		</button>
		</div>
	</div>

	<div class="bg-light text-dark shadow p-3 mb-2 rounded">
		<h4>Details</h4>
		<div id="btc-details">...</div>
	</div>

	<div class="bg-light text-dark shadow p-3 mb-2 rounded">
		<h4>Setting Price Alert</h4>
		<table class="table table-striped">
			<thead>
				<tr>
				  <th>Current Price</th>
				  <th>Max</th>
				  <th>Min</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<div id="btc-price">...</div>
					</td>
					<td>
						<div id="btc-max-price">...</div>
					</td>
					<td>
						<div id="btc-min-price">...</div>
					</td>
				</tr>
			</tbody>
		</table>
	   <div id="btnCoinAlert" class="btn btn-info">Send Slack Message</div>
	</div>

	<script type="text/javascript" src="js/coin_alert.js" ></script>
</div>