window.addEventListener("load", function () {
    document.getElementById("texto").addEventListener("keyup", function () {
        console.log(document.getElementById("texto").value);

        // Realizar la solicitud a la API en tu backend
        fetch(`/search?texto=${document.getElementById("texto").value}`, {
            method: 'get'
        })
        .then(response => response.json())
        .then(data => {
            // Manipular la respuesta de la API
            const results = data.results;

            // Actualizar la interfaz de usuario con los resultados obtenidos
            const resultadosElement = document.getElementById("resultados");
            resultadosElement.innerHTML = "";

            results.forEach(result => {
                const itemElement = document.createElement("div");
                itemElement.textContent = result.nombre_archivo;
                resultadosElement.appendChild(itemElement);
            });
        })
        .catch(error => console.log(error));
    });
});
