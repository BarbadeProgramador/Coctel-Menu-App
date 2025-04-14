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
                let fila = $(this).find('td');
                bebidas.push({
                    nombre: fila.eq(0).text(),
                    base: fila.eq(1).text(),
                    ingredientes: fila.eq(2).text(),
                    alcohol: fila.eq(3).text(),
                    categoria: fila.eq(4).text()
                });
            });

            $('#seleccionadas').val(JSON.stringify(bebidas));
        });
    });
