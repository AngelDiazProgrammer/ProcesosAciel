function eliminarCarpeta(nombreParametro) {
    if (confirm('¿Estás seguro de que deseas eliminar esta carpeta?')) {
        // Realiza una solicitud AJAX para eliminar la carpeta
        // Asegúrate de tener la ruta adecuada y los nombres de ruta y token CSRF correctos
        var url = "{{ route('eliminar.carpeta', ['nombreParametro' => '']) }}";
        url = url.replace('%7BnombreParametro%7D', nombreParametro);

        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            // Realiza alguna acción después de eliminar la carpeta, si es necesario
            // Por ejemplo, puedes recargar la página o actualizar la interfaz de usuario
        })
        .catch(error => {
            console.error('Se produjo un error al eliminar la carpeta:', error);
        });
    }
}
