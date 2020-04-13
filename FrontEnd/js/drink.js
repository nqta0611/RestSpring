console.log('Drink Page Ready.....');

    $( "#btnAddDrink" ).click(function( event ) {
        newDrink = {
            amount : $( "#amount" ).val(),
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
        event.preventDefault();
    });