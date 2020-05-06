console.log('Coin Alert Page Ready.....');
	updateBtc();
	setInterval(updateBtc, 5000);

	function updateBtc() {
		updateBtcNomics();
		updateBtcBitstamp();
		updateBtcCoinbase();

      var d = new Date() + " ";
		$( "#btc-last-time").html(d.split("GMT")[0]);  
	}

	function updateBtcBitstamp() {
		var url = bitstamp_url + "ticker_hour";
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
      var msg = "BTC\nBitstamp: " + $( "#btc-price-bitstamp" ).html() 
      			+ "\nNomics: " + $( "#btc-price-nomics" ).html() 
      			+ "\nCoinbase: " + $( "#btc-price-coinbase" ).html();
		var slack_data = JSON.stringify({ "text" : msg });
		$.post(slack_url + slack_key, slack_data).done(function( data ) {
			console.log(data);
			$( "#btnCoinAlert" ).attr("disabled", false);
			$( "#btnCoinAlert" ).html("<i class='fa fa-paper-plane'></i> Sending");
      });
      event.preventDefault();
	});


// try
	let i = 0;
	function increment() {
	  i++;
	  console.log(i);
	}

	let timeIntervalID = 0;
	$( "#btnCoinAlertInterval" ).click(function( event ) {
		timeIntervalID = setInterval(increment, 1000);
      event.preventDefault();
	});

	$( "#btnCoinCancelAlertInterval" ).click(function( event ) {
		clearInterval(timeIntervalID);
      event.preventDefault();
	});
	

	
