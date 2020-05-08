<div class="container" style="margin-bottom: 110px;">
	
	<div class="d-flex align-items-center justify-content-between mb-3 rounded"  style="background-color: #000000;">
		<div class="p-2 d-flex align-items-center ml-1">
			<img class="p-2 img-fluid" style="width:90px;" src="<?=base_url()?>/images/btc-halving.jpg">
			<div>
				<h4>Halving Countdown</h4>
				<div class="font-italic">Est: May 11, 2020 23:51:28 UTC</div>
			</div>
		</div>
		<div class="p-2 mr-3">
			<h4><span id="btc-havlving-time">4D 11:13:51</span></h4>
		</div>
	</div>
	<div class="d-flex align-items-center bg-light text-dark shadow p-3 mb-3 rounded">
		<div class="p-2 flex-shrink-0">
			<img class="img-fluid" style="width:70px;" src="https://s3.us-east-2.amazonaws.com/nomics-api/static/images/currencies/btc.svg">
		</div>
		<div class="p-2 w-100">
			<h4>Coin Watch</h4>
	  		<div id="btc-last-time" class="font-italic text-black-50"></div>
		</div>
	  	<div class="p-2 flex-shrink-0">
	  		<div class="font-italic text-success">Bitstamp</div>
	  		<div class="font-italic text-info">Coinbase</div>
	  		<div class="font-italic text-dark">Nomics</div>
	  	</div>
		<div class="p-2 flex-shrink-0 text-monospace text-warning font-weight-bold">
			<div id="btc-price-bitstamp"></div>
			<div id="btc-price-coinbase"></div>
			<div id="btc-price-nomics"></div>
	  	</div>
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
						<div>Send price every</div>
					</td>
					<td>
						<div class="form-group">
						   <select id="btc-alert-period-val" class="form-control" id="exampleFormControlSelect1">
						      <option value="10">10 mins</option>
						      <option value="30" selected="selected">30 mins</option>
						      <option value="45">45 mins</option>
						      <option value="60">1 hour</option>
						      <option value="90">1 h 30 mins</option>
						      <option value="120">2 hour</option>
						   </select>
					  	</div>
					</td>
					<td>
						<div class="d-flex justify-content-center">
							<label class="switch p-2">
						  		<input id="btc-alert-period" type="checkbox">
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
						<div>
							<input id="btc-max-price" type="number" class="form-control" placeholder="Enter whole $ price">
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
						<div>Send alert when price is below</div>
					</td>
					<td>
						<div id="btc-max-price">
							<input id="btc-max-price" type="number" class="form-control" placeholder="Enter whole $ price">
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
						<div>
							<div class="form-group">
							   <select id="btc-alert-interval-val" class="form-control" id="exampleFormControlSelect1">
							      <option value="10">$10</option>
							      <option value="50">$50</option>
							      <option value="100" selected="selected">$100</option>
							      <option value="200">$200</option>
							      <option value="300">$300</option>
							      <option value="500">$500</option>
							      <option value="1000">$1000</option>
							   </select>
						  	</div>
						</div>
					</td>
					<td>
						<div class="d-flex justify-content-center">
							<label class="switch p-2">
						  		<input id="btc-alert-interval" type="checkbox">
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
	<script type="text/javascript"> var coinbase_url = "<?php echo $this->config->item('coinbase_url');?>"; </script>
	<script type="text/javascript"> var bitstamp_url = "<?php echo $this->config->item('bitstamp_url');?>"; </script>
	<script type="text/javascript" src="js/coin_alert.js" ></script>
</div>