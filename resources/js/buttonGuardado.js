import $ from 'jquery';

$(function() {
    $('.menu-btn').on('click', function() {
        const section = $(this).data('section');
        const $button = $(this);

        // Cambiar el estilo del botón seleccionado
        $('.menu-btn').removeClass('bg-blue-600 text-white').addClass('text-gray-700');
        $button.removeClass('text-gray-700').addClass('bg-blue-600 text-white');

        // Hacer la petición AJAX
        $.ajax({
            url: '/dashboard/section',
            method: 'GET',
            data: { section: section },
            success: function(response) {
                // Actualizar el contenido con el HTML recibido
                $('#section-content').html(response.html);
            },
            error: function() {
                $('#section-content').html('<p>Hubo un error al cargar los datos.</p>');
            }
        });
    });
});
