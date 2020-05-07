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
	

	
