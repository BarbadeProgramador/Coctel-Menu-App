import $ from 'jquery';
import Swal from 'sweetalert2';

let seleccionadas = [];

// Evento delegado para agregar/quitar bebidas
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
        // Agregar bebida
        seleccionadas.push(bebida);
        $btn
            .html('✅ Agregado')
            .addClass('bg-green-100  border-green-400')
            .removeClass('hover:bg-gray-100');
    } else {
        // Quitar bebida
        seleccionadas.splice(index, 1);
        $btn
            .html('➕ Agregar')
            .removeClass('bg-green-100 text-green-700 border-green-400')
            .addClass('hover:bg-gray-100');
    }

    // Actualizar contador
    $('#contador').text(seleccionadas.length);
});

// ✅ Registrar bebidas
$(function () {
    $('#registrar').on('click', function (e) {
        if (seleccionadas.length === 0) {
            e.preventDefault(); 
            Swal.fire({
                icon: 'warning',
                title: '¡Atención!',
                text: 'Debes seleccionar al menos 1 bebida antes de registrar.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        const seleccionadasJson = JSON.stringify(seleccionadas);
        $('#seleccionadas').val(seleccionadasJson);
        console.log('Enviando:', seleccionadasJson); // Para depuración
    });
});
