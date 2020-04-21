console.log('Drink Page Ready.....');

    $( "#btnAddDrink" ).click(function( event ) {
        console.log("clickkkk");
        amount = $( "#amountAddDrink" ).val() | 0;
        errorMessage = '';
        if (isNaN(amount) || amount <= 0) {
            errorMessage = "Please enter a positive number";
            $("#errorMessage").html(errorMessage);
        } else {
            $("#errorMessage").html(errorMessage);
            newDrink = {
                amount,
                unit : $( "#unitAddDrink" ).val()
            };
            $.post( api_url + 'demo/add_drink' , newDrink).done(function( data ) {
                console.log("sending......");
                $.get( api_url + 'demo/all_drink' ).done(function( data ) {
                    $( "#amountAddDrink" ).val("");
                    $( "#unitAddDrink" ).val("");
                    location.reload();
                });
            });
        }
        event.preventDefault();
    });