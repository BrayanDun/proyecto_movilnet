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
        var modal = document.getElementById('modal');
        console.log('Intentando abrir modal en índice:', index);
        if (modal) {
            modal.classList.add('modal--show');
            console.log('Número de modales encontrados:', modals.length);
            console.log('Modal abierto con éxito');
        } else {
            console.error('Error: El modal en el índice', index, 'no fue encontrado.');
        }
    }
    
    function cerrarModal(index) {
        var modal = obtenerModal(index);
        if (modal) {
            modal.classList.remove('modal--show');
        } else {
            console.error('Error: El modal en el índice', index, 'no fue encontrado.');
        }
    }

    function obtenerModal(index) {
        return modals.length > index ? modals[index] : null;
    }

    function cargarDetallesServidor(servidorId, modalIndex) {
        fetch('detalles_servidor.php?id=' + servidorId)
            .then(response => response.json())
            .then(data => {
                detalleDatos.innerHTML = formatDetalles(data);
                abrirModal(modalIndex);
            })
            .catch(error => {
                console.error('Error al cargar detalles del servidor:', error);
            });
    }

    function formatDetalles(data) {
        return '<strong>ID:</strong> ' + data.id + '<br>' +
            '<strong>Nombre:</strong> ' + data.nombre + '<br>' +
            '<strong>IP:</strong> ' + data.ip + '<br>' +
            '<strong>Estatus:</strong> ' + data.estatus;
    }
});
