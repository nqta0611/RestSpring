console.log('Ready.....');


    $( "#addUserForm" ).submit(function( event ) {
        console.log( "Handler for submit add user form" );

        newUser = {
            name : this.name.value,
            email : this.email.value
        };

        $.post( "http://10.0.0.213:8080/demo/add", newUser).done(function( data ) {
            console.log(data);
            $.get( "http://10.0.0.213:8080/demo/all").done(function( data ) {
                console.log(data);
            });
        });

        

        event.preventDefault();
    });