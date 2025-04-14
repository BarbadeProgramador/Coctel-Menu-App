import $ from 'jquery';

//DEFAULT
$(function() {
    // Realizar la solicitud AJAX para la sección predeterminada
    $.ajax({
        url: '/dashboard/section',
        method: 'GET',
        data: { section: 'seccion1' },
        success: function(response) {
            // Se actualiza el contenido con el HTML recibido del controlador
            $('#section-content').html(response.html);
            
            // Cambiar el estilo del botón seleccionado
            $('.menu-btn').removeClass('bg-blue-600 text-white').addClass('text-gray-700');
            $('.menu-btn[data-section="seccion1"]').removeClass('text-gray-700').addClass('bg-blue-600 text-white');
        },
        error: function() {
            $('#section-content').html('<p>Hubo un error al cargar los datos.</p>');
        }
    });
});




$(function() {
    // Al hacer clic en un botón del menú
    $('.menu-btn').on('click', function() {
        const section = $(this).data('section');
        const $button = $(this);

        // Cambiar el estilo del botón seleccionado
        $('.menu-btn').removeClass('bg-blue-600 text-white').addClass('text-gray-700');
        $button.removeClass('text-gray-700').addClass('bg-blue-600 text-white');

        // Realizar la solicitud AJAX
        $.ajax({
            url: '/dashboard/section',
            method: 'GET',
            data: { section: section },
            success: function(response) {
                // Actualizar el contenido con el HTML recibido del controlador
                $('#section-content').html(response.html);
            },
            error: function() {
                $('#section-content').html('<p>Hubo un error al cargar los datos.</p>');
            }
        });
    });
});
