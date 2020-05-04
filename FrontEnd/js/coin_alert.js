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

		$.get("https://api.nomics.com/v1/currencies/ticker?key=494c3eeb58521c4579e41989c7cddc83&ids=BTC").done(function( data ) {
         console.log("requesting new BTC data");

			$( "#btc-cur-price" ).html("BTC: " + data[0]["price"]);
			$( "#btc-cur-price-time").html(((new Date(data[0]["price_timestamp"])) + " ").split("GMT")[0]);    
         $( "#btc-update-button" ).attr("disabled", false);
      });
	}

	$( "#btc-update-button" ).click(function( event ) {
		clearBtcData();
		updateBtc();
	});