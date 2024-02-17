document.addEventListener('DOMContentLoaded', function () {
    var verMasButtons = document.querySelectorAll('.ver-mas');
    var closeModalButtons = document.querySelectorAll('.modal__close');
    var modals = document.querySelectorAll('.modal');
    var detalleDatos = document.querySelector('.modal__container p#detalleDatos');

    verMasButtons.forEach(function (button, index) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            var servidorId = button.getAttribute('data-id');
            cargarDetallesServidor(servidorId, index);
        });
    });

    closeModalButtons.forEach(function (closeButton, index) {
        closeButton.addEventListener('click', function (e) {
            e.preventDefault();
            cerrarModal(index);
        });
    });

    function abrirModal(index) {
        modals[index].classList.add('modal--show');
    }

    function cerrarModal(index) {
        modals[index].classList.remove('modal--show');
    }

    function cargarDetallesServidor(servidorId, modalIndex) {
        fetch('detalles_servidor.php?id=' + servidorId)
            .then(response => response.json())
            .then(data => {
                // Actualiza el contenido del modal con los detalles obtenidos
                detalleDatos.innerHTML = formatDetalles(data);
                abrirModal(modalIndex);
            })
            .catch(error => {
                console.error('Error al cargar detalles del servidor:', error);
            });
    }

    function formatDetalles(data) {
        // Puedes personalizar esta función para formatear los detalles según tus necesidades
        return '<strong>ID:</strong> ' + data.id + '<br>' +
               '<strong>Nombre:</strong> ' + data.nombre + '<br>' +
               '<strong>IP:</strong> ' + data.ip + '<br>' +
               '<strong>Estatus:</strong> ' + data.estatus;
    }
});
