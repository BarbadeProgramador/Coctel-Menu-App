import $ from 'jquery';

let seleccionadas = [];

    // Evento delegado
    $(document).on('click', '.btn-agregar', function () {
        const $btn = $(this);

        const bebida = {
            nombre: $btn.data('nombre'),
            imagen: $btn.data('imagen'),
            base: $btn.data('base'),
            ingredientes: $btn.data('ingredientes'),
            alcohol: $btn.data('alcohol'),
            categoria: $btn.data('categoria')
        };

        const index = seleccionadas.findIndex(item => item.nombre === bebida.nombre);

        if (index === -1) {
            // No está seleccionada, la agregamos
            seleccionadas.push(bebida);
            $btn
                .html('✅ Agregado')
                .addClass('bg-green-100 text-green-700 border-green-400')
                .removeClass('hover:bg-gray-100');
        } else {
            // Ya estaba, la quitamos
            seleccionadas.splice(index, 1);
            $btn
                .html('➕ Agregar')
                .removeClass('bg-green-100 text-green-700 border-green-400')
                .addClass('hover:bg-gray-100');
        }

        $('#contador').text(seleccionadas.length);
    });



    // $('#registrar').on('click', function () {
    //     if (seleccionadas.length === 0) {
    //         alert('Selecciona al menos una bebida primero');
    //         return;
    //     }

    //     $('#seleccionadas').val(JSON.stringify(seleccionadas));
    //     $('#form-seleccionadas').submit();
    // });