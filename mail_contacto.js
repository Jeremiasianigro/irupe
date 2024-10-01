document.getElementById('Mail_contacto').addEventListener('submit', function(event) {
    event.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const mail = document.getElementById('mail').value;
    const asunto = document.getElementById('asunto').value;
    const mensaje = document.getElementById('mensaje').value;

    if (nombre === "" || mail === "" || asunto === "" || mensaje === "") {
        Swal.fire({
            title: 'Error',
            text: 'Por favor, completa todos los campos.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } else {
        // Crear un objeto con los datos del formulario
        const formData = new FormData();
        formData.append('nombre', nombre);
        formData.append('mail', mail);
        formData.append('asunto', asunto);
        formData.append('mensaje', mensaje);

        // Enviar los datos mediante fetch (solicitud AJAX)
        fetch('mail.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // Puedes ajustar esto según la respuesta que devuelva tu backend
        .then(data => {
            Swal.fire({
                title: 'Éxito',
                text: 'El correo se envió correctamente, nos contactaremos con vos a la brevedad.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // Limpiar los campos del formulario sin redirigir la página
                document.getElementById('Mail_contacto').reset();
            });
        })
        .catch(error => {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al enviar el correo. Intenta de nuevo.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    }
});
