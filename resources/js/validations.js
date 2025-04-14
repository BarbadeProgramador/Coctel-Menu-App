function eliminarCoctel(id) {
    if (confirm('¿Estás seguro de que deseas eliminar este cóctel?')) {
        $.ajax({
            url: `/confirmacion/delete/${id}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert(response.mensaje);
                // Eliminar la tarjeta del DOM
                $(`#coctel-${id}`).remove();
            },
            error: function(xhr) {
                alert('Error al eliminar el cóctel');
            }
        });
    }
}



function actualizarCoctel(id) {
    // Lógica para actualizar el cóctel, por ejemplo, redirigiendo a una página de edición
    console.log('Actualizar cóctel con ID:', id);
    // window.location.href = `/cocteles/${id}/edit`;
}

window.eliminarCoctel = eliminarCoctel;
window.actualizarCoctel = actualizarCoctel;