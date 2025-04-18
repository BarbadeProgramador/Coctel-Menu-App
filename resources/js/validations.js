import Swal from 'sweetalert2';
import $ from 'jquery';

export function eliminarCoctel(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/confirmacion/delete/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                success: function(response) {
                    Swal.fire(
                        '¡Eliminado!',
                        response.mensaje,
                        'success'
                    );
                    document.getElementById(`coctel-${id}`).remove();
                },
                error: function(xhr) {
                    Swal.fire(
                        'Error',
                        'Error al eliminar el cóctel',
                        'error'
                    );
                }
            });
        }
    });
}


//Mensaje de Actualizacion con exito 
document.addEventListener('DOMContentLoaded', (e) => {
    e.preventDefault();
    const flash = document.getElementById('flash-success');
    if (flash) {
        const message = flash.getAttribute('data-message');
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: message,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });
    }
})



window.eliminarCoctel = eliminarCoctel;