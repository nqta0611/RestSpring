console.log('Ready.....');

    $( "#addUserForm" ).submit(function( event ) {
        console.log( "Handler for submit add user form" );
        newUser = {
            name : this.name.value,
            email : this.email.value
        };

        console.log ($api_url);
        $.post( $api_url + 'demo/add' , newUser).done(function( data ) {
            console.log(data);
            $.get( $api_url + 'demo/all' ).done(function( data ) {
                console.log(data);
            });
        });
        event.preventDefault();
    });