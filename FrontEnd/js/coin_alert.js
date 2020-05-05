console.log('Coin Alert Page Ready.....');
	updateBtc();

	function clearBtcData() {
		console.log("Clear BTC data");

		$( "#btc-update-button" ).attr("disabled", true);
     	$( "#btc-cur-price" ).html("");
      $( "#btc-cur-price-time").html("");
	}

	function updateBtc() {
		console.log("Update BTC data");

		var url = nomics_url + "ticker?key=" + nomics_key + "&ids=BTC";
		$.get(url).done(function( data ) {
         console.log("requesting new BTC data");

			$( "#btc-cur-price" ).html("BTC: " + Math.round(data[0]["price"] * 100) / 100 );
			$( "#btc-cur-price-time").html(((new Date(data[0]["price_timestamp"])) + " ").split("GMT")[0]);    
         $( "#btc-update-button" ).attr("disabled", false);
      });
	}

	$( "#btc-update-button" ).click(function( event ) {
		clearBtcData();
		updateBtc();
      event.preventDefault();
	});


	function sendSackMsg() {
		
	}

	$( "#btnCoinAlert" ).click(function( event ) {
		console.log("click send slack msg");

		var url = nomics_url + "ticker?key=" + nomics_key + "&ids=BTC";
		$.get(url).done(function( data ) {
			$( "#btc-cur-price" ).html("BTC: " + Math.round(data[0]["price"] * 100) / 100 );
			$( "#btc-cur-price-time").html(((new Date(data[0]["price_timestamp"])) + " ").split("GMT")[0]);    

         console.log("sending msg");
			var slack_data = JSON.stringify({ "text" : $( "#btc-cur-price" ).html() });
			$.post(slack_url + slack_key, slack_data).done(function( data ) {
				console.log(data);
	      });
      });
      event.preventDefault();
	});