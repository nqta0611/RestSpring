<div class="container" style="margin-bottom: 110px;">
	<div class="row bg-light text-dark shadow p-3 mb-2 rounded">
		<h3>Water drinking</h3>
	</div>
	<div class="row shadow p-3 mb-4 rounded" style="background-image: url(<?=base_url()?>/images/water-surface.jpg);  background-repeat: no-repeat; background-size: 100%">
		<div class="col-lg-4">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="today-content-tab" data-toggle="tab" href="#today-content" role="tab" aria-controls="today-content"
			      aria-selected="true"><h6>Today</h6></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="this-week-content-tab" data-toggle="tab" href="#this-week-content" role="tab" aria-controls="this-week-content"
			      aria-selected="false"><h6>This Week</h6></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="all-time-content-tab" data-toggle="tab" href="#all-time-content" role="tab" aria-controls="all-time-content"
			      aria-selected="false"><h6>All Time</h6></a>
			  </li>
			</ul>
		</div>
		<div class="col-lg">
			<p id="errorMessage" class="alert-danger"></p>
		</div>
		<div class="col-lg-4 input-group">
			<input id="amountAddDrink" class="form-control" type="number" placeholder="Amount" step="1" min="0">
	    	<select class="custom-select input-group-append" id="unitAddDrink">
			  <option value="ml">ml</option>
			  <option value="oz">Oz</option>
			  <option value="sp">Sip</option>
			</select>
			<button id="btnAddDrink" class="btn btn-info input-group-append" type="button">Add drink</button>	
		</div>
	</div>

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
							$today_consumed = 0;
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
									<?php 
									echo $value["amountInMl"]; 
									$today_consumed += $value["amountInMl"];
									?>
								</td>
							</tr> 
							<?php }
							$today_percentage = $today_consumed/20;
						}?>
						</tbody>
					</table>
				</div>
				<div class="space-right"></div>
				<div class="col-lg card">
					<div class="card-body">
						<h4>Daily drinking progress <span class="badge badge-warning"><?php echo $today_percentage; ?>%</span></h4>
						<div class="progress">
						  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="2000" style="width: <?php echo $today_percentage; ?>%"><?php echo $today_consumed;?>ml</div>
						</div>
						<div class="py-5 row">
							<div class="col-4">
								<img class="img-thumbnail" src="<?=base_url()?>/images/water-bottle.jpg">
							</div>
							<div class="col">
								<p>Drinking enough water every day is good for overall health. As plain drinking water has zero calories, it can also help with managing body weight and reducing caloric intake when substituted for drinks with calories, like regular soda.  Drinking water can prevent dehydration, a condition that can cause unclear thinking, result in mood change, cause your body to overheat, constipation, and kidney stones.</p>
								<a href="https://www.cdc.gov/nutrition/data-statistics/plain-water-the-healthier-choice.html" target="_blank">CDC resource</a>
							</div>
						</div>
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
				<div class="space-right"></div>
				<div class="col-lg card">
					<div class="card-body">
						Weekly info
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
				<div class="space-right"></div>
				<div class="col-lg card">
					<div class="card-body">
						All Time info
					</div>
				</div>
			</div>
	  	</div>
	</div>


	<script type="text/javascript"> var api_url = "<?php echo $this->config->item('api_url');?>"; </script>
	<script type="text/javascript" src="js/drink.js" ></script>
</div>