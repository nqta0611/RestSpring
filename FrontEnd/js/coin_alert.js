console.log('Coin Alert Page Ready.....');
	var custome_slack_webhook = "";
	updateBtc();
	setInterval(updateBtc, 5000);
	setInterval(updateCountdown, 1000);

	function updateCountdown() {
		var d = new Date();
		var halving = new Date("May 11, 2020 23:51:28 UTC");
		var seconds = parseInt((halving - d)/1000);

		var days = parseInt( seconds / 86400 ); 
		seconds = seconds % 86400;
		var hours = parseInt( seconds / 3600 ); 
		seconds = seconds % 3600;
		var minutes = parseInt( seconds / 60 ); 
		seconds = seconds % 60;
		$("#btc-havlving-time").html(days + "D "+ hours + ":" + minutes + ":" + seconds)
	}

	function updateBtc() {
		updateBtcNomics();
		updateBtcBitstamp();
		updateBtcCoinbase();

      var d = new Date() + " ";
		$( "#btc-last-time").html(d.split("GMT")[0]);  

		// Check Alert setting & send msg
		// Above Alert
		if ($("#btc-alert-above").prop("checked") &&
		 	($("#btc-alert-above-val").val() !== "") &&
		 	(parseInt($( "#btc-price-bitstamp" ).html()) > $("#btc-alert-above-val").val())) {
			sendSlackMsg("RISE above: " + $("#btc-alert-above-val").val() 
				+ "\nBitstamp: " + $( "#btc-price-bitstamp" ).html());
			//$("#btc-alert-above").prop( "checked", false );
			//$("#btc-alert-above-val").val("");
			//$("#btc-alert-above-val").attr("placeholder", "Alert Sent at " + $( "#btc-price-bitstamp" ).html());
		}
		// Below Alert
		if ($("#btc-alert-below").prop("checked") &&
		 	($("#btc-alert-below-val").val() !== "") &&
		 	(parseInt($( "#btc-price-bitstamp" ).html()) < $("#btc-alert-below-val").val())) {
			sendSlackMsg("DROP below: " + $("#btc-alert-below-val").val() 
				+ "\nBitstamp: " + $( "#btc-price-bitstamp" ).html());
			//$("#btc-alert-below").prop( "checked", false );
			//$("#btc-alert-below-val").val("");
			//$("#btc-alert-below-val").attr("placeholder", "Alert Sent at " + $( "#btc-price-bitstamp" ).html());
		}
		// Interval Alert
		if ($("#btc-alert-interval").prop("checked")){
			checkIntervalAlert();
		}
	}

	function updateBtcBitstamp() {
		var url = bitstamp_url + "ticker";
		$.get(url).done(function( data ) {
         var price = data.last;
			$( "#btc-price-bitstamp" ).html( Math.round(price * 100) / 100 ); 
      });
	}

	function updateBtcNomics() {
		var url = nomics_url + "ticker?key=" + nomics_key + "&ids=BTC";
		$.get(url).done(function( data ) {
			$( "#btc-price-nomics" ).html( Math.round(data[0]["price"] * 100) / 100 );
      });
	}

	function updateBtcCoinbase() {
		var url = coinbase_url + "prices/BTC-USD/spot";
		$.get(url).done(function( data ) {
			$( "#btc-price-coinbase" ).html( Math.round(data.data.amount * 100) / 100 );
      });
	}

// Slack Alert Center
// Send once
	$( "#btnCoinAlert" ).click(function( event ) {
		$( "#btnCoinAlert" ).attr("disabled", true);
		$( "#btnCoinAlert" ).html("<i class='fa fa-spinner'></i> Sending");

		console.log("sending msg");
      var msg = "BTC\nBitstamp:\t" + $( "#btc-price-bitstamp" ).html() 
      			+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
		var slack_data = JSON.stringify({ "text" : msg });
		$.post((custome_slack_webhook !== "" ? custome_slack_webhook !== "" : slack_url) + slack_key, slack_data).done(function( data ) {
			console.log(data);
			$( "#btnCoinAlert" ).attr("disabled", false);
			$( "#btnCoinAlert" ).html("<i class='fa fa-paper-plane'></i> Send");
      });
      event.preventDefault();
	});

// Every... Alert
	var interval_id = -1;
	var period = 30;  // default interval is set to 30mins
	$( "#btc-alert-period-val" ).change(function() {
		period = parseInt($("#btc-alert-period-val").val());
		if($( "#btc-alert-period" ).prop("checked")) {
			clearInterval(interval_id);
			interval_id = setInterval(sendPeriodAlert, period  * 60 *1000);
		}
	});
	function sendPeriodAlert() {
      var msg = period + "mins update\nBitstamp:\t" + $( "#btc-price-bitstamp" ).html() 
      			+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
		sendSlackMsg(msg);
	}
	$( "#btc-alert-period" ).change(function() {
		if(this.checked) {
			//console.log("Period Alert ON with period = " + period);
			interval_id = setInterval(sendPeriodAlert, period * 60 * 1000);
		} else {
			if (interval_id !== -1) {
				//console.log("Period Alert OFF");
				clearInterval(interval_id);
			}
		}
	});

// Interval Alert
	var alert_interval = 100;
	var last_alert = 9000;
	$( "#btc-alert-interval-val" ).change(function() {
		alert_interval = parseInt($("#btc-alert-interval-val").val());
	});

	function checkIntervalAlert() {
		var new_alert_range = (parseInt($("#btc-price-bitstamp").html()) -
					parseInt($("#btc-price-bitstamp").html()) % alert_interval);
		if (new_alert_range < last_alert) {
			var msg = "DROP from " + last_alert + "'s\n" +
						"Bitstamp:\t" + $( "#btc-price-bitstamp" ).html() ;
      			//+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			//+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
      	var slack_data = JSON.stringify({ "text" : msg });
			$.post((custome_slack_webhook !== "" ? custome_slack_webhook !== "" : slack_url) + slack_key, slack_data).done(function( data ) {
				last_alert = new_alert_range;
				alert_interval = parseInt($("#btc-alert-interval-val").val());
			});
		} else if (new_alert_range > last_alert) {
			var msg = "RISE from " + last_alert + "'s\n" +
						"Bitstamp:\t" + $( "#btc-price-bitstamp" ).html() ;
      			//+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			//+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
      	var slack_data = JSON.stringify({ "text" : msg });
			$.post((custome_slack_webhook !== "" ? custome_slack_webhook !== "" : slack_url) + slack_key, slack_data).done(function( data ) {
				last_alert = new_alert_range;
				alert_interval = parseInt($("#btc-alert-interval-val").val());
			});
		}
	}

	function sendSlackMsg(msg) {
		var slack_data = JSON.stringify({ "text" : msg });
		$.post((custome_slack_webhook !== "" ? custome_slack_webhook !== "" : slack_url) + slack_key, slack_data).done(function( data ) {
			console.log(data);
      });
	}

	$( "#btc-slack-info-btn" ).click(function( event ) { 
		console.log('click info');
		$("#btc-slack-info-block").toggle();
	});

	$( "#btc-alert-slack-hook-input").change(function() {
		custome_slack_webhook = $( "#btc-alert-slack-hook-input").val();
	});
	

	
