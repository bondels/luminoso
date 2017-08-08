// Contact Form Scripts

$(function() {

    $("input,textarea,select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var nombre = $("input#nombre").val();
            var rut = $("input#rut").val();
            var region = $("select#region").val();
            var email = $("input#email").val();
            var telefono = $("input#telefono").val();
          
            var firstName = nombre;
            if (firstName.indexOf(' ') >= 0) {
                firstName = nombre.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "./mail/contact_me.php",
                type: "POST",
                data: {
                    nombre: nombre,
                    rut: rut,
                    region: region,
                    email: email,
                    telefono: telefono,
    
                },
                cache: false,
                success: function() {
                    // Success message
                   /* $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Tu mensaje se ha enviado </strong>");
                    $('#success > .alert-success')
                        .append('</div>');*/

                    //clear all fields
                    $('#contactForm').trigger("reset");
                     window.location="gracias.php";
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append($("<strong>").text("Lo sentimo " + firstName + ", no se ha enviado el mensaje, puede probar más tarde!"));
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            });
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
