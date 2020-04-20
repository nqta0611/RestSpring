<div class="container">
		<ul class="nav nav-tabs bg-light row shadow p-3 mb-4 rounded" id="myTab" role="tablist">
		  <li class="nav-item col-lg-4">
		    <a class="nav-link active" id="today-content-tab" data-toggle="tab" href="#today-content" role="tab" aria-controls="today-content"
		      aria-selected="true"><h6>Today</h6></a>
		  </li>
		  <li class="nav-item col-lg-4">
		    <a class="nav-link" id="this-week-content-tab" data-toggle="tab" href="#this-week-content" role="tab" aria-controls="this-week-content"
		      aria-selected="false"><h6>This Week</h6></a>
		  </li>
		  <li class="nav-item col-lg-4">
		    <a class="nav-link" id="all-time-content-tab" data-toggle="tab" href="#all-time-content" role="tab" aria-controls="all-time-content"
		      aria-selected="false"><h6>All Time</h6></a>
		  </li>
		</ul>

	<div class="tab-content" id="myTabContent">
	  	<div class="tab-pane fade show active" id="today-content" role="tabpanel" aria-labelledby="today-content-tab">
	  		<div class="row">
				<div class="col-lg-4 card">
					<table class="table table-striped">
						<thead>
							<tr>
							  <th>#</th>
							  <th>Date</th>
							  <th>Time</th>
							  <th>Amount (ml)</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$today_counter = 1;
							$today = date("m-d-y",time());
							foreach ($drinkList as $key => $value) { 
							 	$drink_date = date("m-d-y", strtotime($value["timestamp"]));
								if ($today == $drink_date) {
							?>
							<tr>
								<td>
									<?php echo $today_counter++; ?>
								</td>
								<td>
									<?php echo date("F j", strtotime($value["timestamp"])); ?>
								</td>
								<td>
									<?php echo date("g:i A", strtotime($value["timestamp"])); ?>
								</td>
								<td>
									<?php echo $value["amountInMl"]; ?>
								</td>
							</tr> 
							<?php }
						}?>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<div class="input-group shadow p-3 mb-5 rounded">
						<input id="amount" class="form-control" type="number" placeholder="Amount" step="1" min="0">
						<p id="errorMessage"></p>
				    	<select class="custom-select input-group-append" id="unit">
						  <option value="ml">ml</option>
						  <option value="oz">Oz</option>
						  <option value="sp">Sip</option>
						</select>
						<button id="btnAddDrink" class="btn btn-info input-group-append" type="button">Add drink</button>
					</div>
				</div>
			</div>
	  	</div>
	  	<div class="tab-pane fade" id="this-week-content" role="tabpanel" aria-labelledby="this-week-content-tab">
	  		<div id="today-content" class="row">
				<div class="col-lg-4 card">
					<table class="table table-striped">
						<thead>
							<tr>
							  <th>ID</th>
							  <th>Date</th>
							  <th>Time</th>
							  <th>Amount (ml)</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$week_counter = 1;
							$week_start = time() - (7 * 24 * 60 * 60);
							foreach ($drinkList as $key => $value) { 
							 	$drink_date = strtotime($value["timestamp"]);
								if ($week_start <= $drink_date) {
							?>
							<tr>
								<td>
									<?php echo $week_counter++; ?>
								</td>
								<td>
									<?php echo date("F j", strtotime($value["timestamp"])); ?>
								</td>
								<td>
									<?php echo date("g:i A", strtotime($value["timestamp"])); ?>
								</td>
								<td>
									<?php echo $value["amountInMl"]; ?>
								</td>
							</tr> 
							<?php }
						}?>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<div class="input-group shadow p-3 mb-5 rounded">
						<input id="amount" class="form-control" type="number" placeholder="Amount" step="1" min="0">
						<p id="errorMessage"></p>
				    	<select class="custom-select input-group-append" id="unit">
						  <option value="ml">ml</option>
						  <option value="oz">Oz</option>
						  <option value="sp">Sip</option>
						</select>
						<button id="btnAddDrink" class="btn btn-info input-group-append" type="button">Add drink</button>
					</div>
				</div>
			</div>
	  	</div>
	  	<div class="tab-pane fade" id="all-time-content" role="tabpanel" aria-labelledby="all-time-content-tab">
	  		<div id="today-content" class="row">
				<div class="col-lg-4 card">
					<table class="table table-striped">
						<thead>
							<tr>
							  <th>ID</th>
							  <th>Date</th>
							  <th>Time</th>
							  <th>Amount (ml)</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$all_counter = 1;
							foreach ($drinkList as $key => $value) { ?>
							<tr>
								<td>
									<?php echo $all_counter++; ?>
								</td>
								<td>
									<?php echo date("F j", strtotime($value["timestamp"])); ?>
								</td>
								<td>
									<?php echo date("g:i A", strtotime($value["timestamp"])); ?>
								</td>
								<td>
									<?php echo $value["amountInMl"]; ?>
								</td>
							</tr> 
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<div class="input-group shadow p-3 mb-5 rounded">
						<input id="amount" class="form-control" type="number" placeholder="Amount" step="1" min="0">
						<p id="errorMessage"></p>
				    	<select class="custom-select input-group-append" id="unit">
						  <option value="ml">ml</option>
						  <option value="oz">Oz</option>
						  <option value="sp">Sip</option>
						</select>
						<button id="btnAddDrink" class="btn btn-info input-group-append" type="button">Add drink</button>
					</div>
				</div>
			</div>
	  	</div>
	</div>


	<script type="text/javascript"> var api_url = "<?php echo $this->config->item('api_url');?>"; </script>
	<script type="text/javascript" src="js/drink.js" ></script>
</div>