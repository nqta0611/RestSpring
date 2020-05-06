console.log('Coin Alert Page Ready.....');
	updateBtc();
	setInterval(updateBtc, 5000);

	function updateBtc() {
		//console.log("Update BTC data");
		$( "#btc-cur-price" ).html("");
      $( "#btc-cur-price-time").html("");

		var url = nomics_url + "ticker?key=" + nomics_key + "&ids=BTC";
		$.get(url).done(function( data ) {
         //console.log("got new BTC data");
         var d = new Date() + " ";
			$( "#btc-cur-price" ).html("BTC: " + Math.round(data[0]["price"] * 100) / 100 );
			$( "#btc-cur-price-time").html(d.split("GMT")[0]);  
      });
	}

	$( "#btnCoinAlert" ).click(function( event ) {
		console.log("click send slack msg");

		$( "#btnCoinAlert" ).attr("disabled", true);
		$( "#btnCoinAlert" ).html("<i class='fa fa-spinner'></i> Sending");

		var url = nomics_url + "ticker?key=" + nomics_key + "&ids=BTC";
		$.get(url).done(function( data ) {
			$( "#btc-cur-price" ).html("BTC: " + Math.round(data[0]["price"] * 100) / 100 );

			$( "#btc-cur-price-time").html(((new Date(data[0]["price_timestamp"])) + " ").split("GMT")[0]);    

         console.log("sending msg");
			var slack_data = JSON.stringify({ "text" : $( "#btc-cur-price" ).html() });
			$.post(slack_url + slack_key, slack_data).done(function( data ) {
				console.log(data);
				$( "#btnCoinAlert" ).attr("disabled", false);
				$( "#btnCoinAlert" ).html("<i class='fa fa-paper-plane'></i> Sending");
	      });
      });
      event.preventDefault();
	});

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
	

	
