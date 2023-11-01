document.getElementById("crear_clientes").addEventListener("submit", function(event) {
    event.preventDefault();

    // Obtener los valores del formulario
    const nombre = document.getElementById("nombre").value;
    const apellidos = document.getElementById("apellidos").value;
    const dni = document.getElementById("dni").value;
    const telefono = document.getElementById("telefono").value;
    const poblacion = document.getElementById("poblacion").value;
    const observaciones = document.getElementById("observaciones").value;

    // Crear una instancia de objeto FormData para enviar los datos
    const formData = new FormData();
    formData.append("nombre", nombre);
    formData.append("apellidos", apellidos);
    formData.append("dni", dni);
    formData.append("telefono", telefono);
    formData.append("poblacion", poblacion);
    formData.append("observaciones", observaciones);

    // Realizar una solicitud AJAX para enviar los datos al servidor PHP
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "guardar_clientes.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Mostrar la respuesta del servidor en el div "mensaje"
            document.getElementById("mensaje").innerHTML = xhr.responseText;
        }
    };
    xhr.send(formData);
});
