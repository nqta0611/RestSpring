<div class="container" style="margin-bottom: 110px;">
	
	<div class="d-flex bg-light text-dark shadow p-3 mb-3 rounded">
		<div class="p-2 flex-shrink-0" style="width:75px; 
				background-image: url(https://s3.us-east-2.amazonaws.com/nomics-api/static/images/currencies/btc.svg); 
				background-repeat: no-repeat;">	
		</div>
		<div class="p-2 w-100">
			<h4>Coin Watch</h4>
		</div>
		<div class="p-2 flex-shrink-0">
	  		<div id="btc-cur-price" class="text-success text-monospace font-weight-bold  text-success"></div>
	  		<div id="btc-cur-price-time" class="font-italic text-black-50"></div>
	  	</div>
	</div>

	<div class="bg-light text-dark shadow p-3 mb-3 rounded">
		<h4>Details</h4>
		<div id="btc-details">...</div>
	</div>

	<div class="bg-light text-dark shadow p-3 mb-3 rounded">
		<label><h4>Slack Alert Center</h4></label>
		<table class="table table-striped">
			<thead>
				<tr>
				  <th>Alert Type</th>
				  <th>Value</th>
				  <th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<div id="btc-price">Send price once</div>
					</td>
					<td>
						<div id="btc-max-price"></div>
					</td>
					<td>
						<div class="d-flex justify-content-center">
							<button id="btnCoinAlert" class="p-2 btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div id="btc-price">Send price every 30mins</div>
					</td>
					<td>
						<div id="btc-max-price"></div>
					</td>
					<td>
						<div class="d-flex justify-content-center">
							<label class="switch p-2">
						  		<input type="checkbox">
						  		<span class="slider round"></span>
							</label>
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div id="btc-price">Send alert when price is above</div>
					</td>
					<td>
						<div id="btc-max-price">
							<input type="text" class="form-control" placeholder="Enter whole $ price">
						</div>
					</td>
					<td>
						<div class="d-flex justify-content-center">
							<label class="switch p-2">
						  		<input type="checkbox">
						  		<span class="slider round"></span>
							</label>
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div id="btc-price">Send alert when price is below</div>
					</td>
					<td>
						<div id="btc-max-price">
							<input type="text" class="form-control" placeholder="Enter whole $ price">
						</div>
					</td>
					<td>
						<div class="d-flex justify-content-center">
							<label class="switch p-2">
						  		<input type="checkbox">
						  		<span class="slider round"></span>
							</label>
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div id="btc-price">Send alert when price hit the interval of</div>
					</td>
					<td>
						<div id="btc-max-price">
							<div class="form-group">
							   <select class="form-control" id="exampleFormControlSelect1">
							      <option>$50</option>
							      <option>$100</option>
							      <option>$1000</option>
							   </select>
						  	</div>
						</div>
					</td>
					<td>
						<div class="d-flex justify-content-center">
							<label class="switch p-2">
						  		<input type="checkbox">
						  		<span class="slider round"></span>
							</label>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Data for JS -->
	<script type="text/javascript"> var nomics_url = "<?php echo $this->config->item('nomics_url');?>"; </script>
	<script type="text/javascript"> var nomics_key = "<?php echo $this->config->item('nomics_key');?>"; </script>
	<script type="text/javascript"> var slack_url = "<?php echo $this->config->item('slack_url');?>"; </script>
	<script type="text/javascript"> var slack_key = "<?php echo $this->config->item('slack_key');?>"; </script>
	<script type="text/javascript" src="js/coin_alert.js" ></script>
</div>