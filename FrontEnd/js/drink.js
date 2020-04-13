console.log('Drink Page Ready.....');

    $( "#btnAddDrink" ).click(function( event ) {
        amount = $( "#amount" ).val() | 0;
        errorMessage = '';
        if (isNaN(amount) || amount <= 0) {
            errorMessage = "Please enter a positive number";
            $("#errorMessage").html(errorMessage);
        } else {
            $("#errorMessage").html(errorMessage);
            newDrink = {
                amount,
                unit : $( "#unit" ).val()
            };
            $.post( api_url + 'demo/add_drink' , newDrink).done(function( data ) {
                console.log("sending......");
                $.get( api_url + 'demo/all_drink' ).done(function( data ) {
                    $( "#amount" ).val("");
                    $( "#unit" ).val("");
                    location.reload();
                });
            });
        }
        event.preventDefault();
    });