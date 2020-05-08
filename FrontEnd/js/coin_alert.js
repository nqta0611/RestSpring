console.log('Coin Alert Page Ready.....');
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

	$( "#btnCoinAlert" ).click(function( event ) {
		$( "#btnCoinAlert" ).attr("disabled", true);
		$( "#btnCoinAlert" ).html("<i class='fa fa-spinner'></i> Sending");

		console.log("sending msg");
      var msg = "BTC\nBitstamp:\t" + $( "#btc-price-bitstamp" ).html() 
      			+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
		var slack_data = JSON.stringify({ "text" : msg });
		$.post(slack_url + slack_key, slack_data).done(function( data ) {
			console.log(data);
			$( "#btnCoinAlert" ).attr("disabled", false);
			$( "#btnCoinAlert" ).html("<i class='fa fa-paper-plane'></i> Sending");
      });
      event.preventDefault();
	});

// Slack Alert Center
// Every... Alert
	var interval_id = -1;
	var period = 10; 
	$( "#btc-alert-period-val" ).change(function() {
		period = parseInt($("#btc-alert-period-val").val());
	});
	function sendPeriodAlert() {
      var msg = period + "mins update\nBitstamp:\t" + $( "#btc-price-bitstamp" ).html() 
      			+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
		var slack_data = JSON.stringify({ "text" : msg });
		$.post(slack_url + slack_key, slack_data).done(function( data ) {
			console.log(data);
      });
	}
	$( "#btc-alert-period" ).change(function() {
		if(this.checked) {
			//console.log("Period Alert ON with period = " + period);
			interval_id = setInterval(sendPeriodAlert, period * 60000);
		} else {
			if (interval_id !== -1) {
				//console.log("Period Alert OFF");
				clearInterval(interval_id);
			}
		}
	});
	

// Slack Alert Center
// Interval Alert
	var alert_interval = 1;
	var last_alert = 1;
	$( "#btc-alert-interval-val" ).change(function() {
		alert_interval = parseInt($("#btc-alert-interval-val").val());
	});

	function setLastAlert() {
		alert_interval = parseInt($("#btc-alert-interval-val").val());
		last_alert = (parseInt($("#btc-price-bitstamp").html() / alert_interval) * alert_interval);
	}

	function checkIntervalAlert() {
		var new_alert_range = parseInt($("#btc-price-bitstamp").html() / alert_interval) * alert_interval;
		if (new_alert_range < last_alert) {
			//console.log("drop: " + $("#btc-price-bitstamp").html() + " / " + last_alert);
			var msg = "Alert: DROP\n" +
						"Bitstamp:\t" + $( "#btc-price-bitstamp" ).html() ;
      			//+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			//+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
      	var slack_data = JSON.stringify({ "text" : msg });
			$.post(slack_url + slack_key, slack_data).done(function( data ) {
				last_alert = new_alert_range;
				alert_interval = parseInt($("#btc-alert-interval-val").val());
				console.log("price : " + $( "#btc-price-bitstamp" ).html());
				console.log("last_alert drop to : " + last_alert);
			});
		} else if (new_alert_range > last_alert) {
			//console.log("rise: " + $("#btc-price-bitstamp").html() + " / " + last_alert);
			var msg = "Alert: RISE ^ ^ ^\n" +
						"Bitstamp:\t" + $( "#btc-price-bitstamp" ).html() ;
      			//+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			//+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
      	var slack_data = JSON.stringify({ "text" : msg });
			$.post(slack_url + slack_key, slack_data).done(function( data ) {
				last_alert = new_alert_range;
				alert_interval = parseInt($("#btc-alert-interval-val").val());
				console.log("price : " + $( "#btc-price-bitstamp" ).html());
				console.log("last_alert rise to : " + last_alert);
			});
		} 
		/* else {
			console.log("no alert: " + $("#btc-price-bitstamp").html() + "/" + last_alert );
		} */
	}


	

	
