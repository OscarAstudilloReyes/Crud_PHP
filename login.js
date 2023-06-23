$(document).ready(function() {



    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Evita el envío del formulario normal

        var usuario = $('#usuario').val();
        var contrasenia = $('#contrasenia').val();

        // Realizar la petición AJAX
        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: { usuario: usuario, contrasenia: contrasenia },
            success: function(response) {
                $('#result').html(response); // Mostrar el resultado en el div result
            },
            error: function() {
                alert('Error en la solicitud AJAX.');
            }
        });
    });
});
