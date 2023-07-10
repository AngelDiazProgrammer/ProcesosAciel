document.querySelectorAll('.formulario-eliminar').forEach(function(formulario) {
    formulario.addEventListener('submit', function(event) {
      event.preventDefault(); // Evita el envío del formulario por defecto
  
      // Muestra la tarjeta de confirmación
      document.getElementById('confirm-modal').style.display = 'block';
      
      // Almacena el formulario actual en una variable
      var currentForm = this;
  
      document.getElementById('confirm-yes').addEventListener('click', function() {
        // Ejecuta el envío del formulario
        currentForm.submit();
  
        // Cierra la tarjeta de confirmación
        document.getElementById('confirm-modal').style.display = 'none';
      });
  
      document.getElementById('confirm-no').addEventListener('click', function() {
        // Cierra la tarjeta de confirmación sin enviar el formulario
        document.getElementById('confirm-modal').style.display = 'none';
      });
    });
  });
  