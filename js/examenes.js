// examenes.js

$(document).ready(function () {
    // Function to search for a patient by name
    $('#nombre').on('input', function () {
        var nombre = $(this).val().trim();
        if (nombre !== '') {
            $.ajax({
                type: 'POST',
                url: 'search_patient.php', // Replace 'search_patient.php' with the PHP file that handles the search logic on the server-side
                data: { nombre: nombre },
                success: function (response) {
                    // Parse the JSON response
                    var paciente = JSON.parse(response);
                    if (paciente) {
                        // Fill the phone and email fields with the patient data
                        $('#apellidos').val(paciente.apellidos);
                        $('#email').val(paciente.email);
                    } else {
                        // Clear the phone and email fields if no matching patient is found
                        $('#apellidos').val('');
                        $('#email').val('');
                    }
                }
            });
        } else {
            // Clear the phone and email fields if the name input is empty
            $('#apellidos').val('');
            $('#email').val('');
        }
    });
});
