import $ from 'jquery';

$(function() {
    // Eliminar fila de la tabla
    $(document).on('click', '.eliminar-fila', function() {
        $(this).closest('tr').remove();
    });

    // Al enviar el formulario, recolectar los datos de la tabla
    $('#form-confirmar').on('submit', function(e) {
        let bebidas = [];

        $('#tabla-bebidas tbody tr').each(function() {
            let $row = $(this);
            bebidas.push({
                imagen: $row.find('input[name$="[imagen]"]').val(),
                nombre: $row.find('input[name$="[nombre]"]').val(),
                base: $row.find('input[name$="[base]"]').val(),
                ingredientes: $row.find('input[name$="[ingredientes]"]').val(),
                categoria: $row.find('input[name$="[categoria]"]').val(),
                precio: $row.find('input[name$="[precio]"]').val()
            });
        });

        $('#seleccionadas').val(JSON.stringify(bebidas));
    });
});
