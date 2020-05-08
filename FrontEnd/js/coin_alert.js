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
		console.log("click send slack msg");

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

	var alert_interval = 1;
	var last_alert = 1;

	function setLastAlert() {
		alert_interval = parseInt($("#btc-alert-interval-val").val());
		last_alert = (parseInt($("#btc-price-bitstamp").html() / alert_interval) * alert_interval);
	}

	function checkIntervalAlert() {
		if ($("#btc-price-bitstamp").html() < last_alert) {
			//console.log("drop: " + $("#btc-price-bitstamp").html() + " / " + last_alert);
			var msg = "ALERT: BTC DROP v v v\n" +
						"Bitstamp:\t" + $( "#btc-price-bitstamp" ).html() 
      			+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
      	var slack_data = JSON.stringify({ "text" : msg });
			$.post(slack_url + slack_key, slack_data).done(function( data ) {
				setLastAlert();
			});
		} else if ($("#btc-price-bitstamp").html() > last_alert + alert_interval) {
			//console.log("rise: " + $("#btc-price-bitstamp").html() + " / " + last_alert);
			var msg = "ALERT: BTC RISE ^ ^ ^\n" +
						"Bitstamp:\t" + $( "#btc-price-bitstamp" ).html() 
      			+ "\nCoinbase:\t" + $( "#btc-price-coinbase" ).html()
      			+ "\nNomics  :\t" + $( "#btc-price-nomics" ).html();
      	var slack_data = JSON.stringify({ "text" : msg });
			$.post(slack_url + slack_key, slack_data).done(function( data ) {
				setLastAlert();
				last_alert = last_alert + alert_interval;
			});
		} 
		/* else {
			console.log("no alert: " + $("#btc-price-bitstamp").html() + "/" + last_alert );
		} */
	}

	$( "#btc-alert-interval-val" ).change(function() {
		alert_interval = parseInt($("#btc-alert-interval-val").val());
	});

	

	
