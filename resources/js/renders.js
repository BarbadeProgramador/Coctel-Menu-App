import $ from 'jquery';

$(function() {
  // Función para mostrar el spinner
  function mostrarSpinner() {
    $('#spinner').removeClass('hidden');
  }

  // Función para ocultar el spinner
  function ocultarSpinner() {
    $('#spinner').addClass('hidden');
  }

  // Solicitud AJAX para la sección predeterminada
  $.ajax({
    url: '/dashboard/section',
    method: 'GET',
    data: { section: 'seccion1' },
    beforeSend: function() {
      mostrarSpinner();
    },
    success: function(response) {
      $('#section-content').html(response.html);
      $('.menu-btn').removeClass('bg-blue-300 text-white border-b-4 border-blue-500 text-gray-700');
      $('.menu-btn[data-section="seccion1"]').removeClass('text-gray-700').addClass('bg-green-300 border-b-4 border-green-500 text-black');
    },
    error: function() {
      $('#section-content').html('<p>Hubo un error al cargar los datos.</p>');
    },
    complete: function() {
      ocultarSpinner();
    }
  });

  // Manejo de clics en los botones del menú
  $('.menu-btn').on('click', function() {
    const section = $(this).data('section');
    const $button = $(this);

    // Restablecer el estilo de todos los botones
    $('.menu-btn').removeClass('bg-green-300 border-b-4 border-green-500 text-black bg-blue-300 text-white border-b-4 border-blue-500').addClass('text-gray-700');
    
    // Aplicar estilo al botón seleccionado
    if ($button.data('section') === 'seccion1') {
      $button.removeClass('text-gray-700').addClass('bg-green-300 border-b-4 border-green-500 text-black');
    } else if($button.data('section') === 'seccion2'){
      $button.removeClass('text-gray-700').addClass('bg-green-300 border-b-4 border-red-500 text-black');
    }

    if (section === 'seccion2') {
      $('.section-count').removeClass('hidden');
      $('.form-excel').addClass('hidden');
    } else {
      $('.form-excel').removeClass('hidden');
      $('.section-count').addClass('hidden');
    }

    $.ajax({
      url: '/dashboard/section',
      method: 'GET',
      data: { section: section },
      beforeSend: function() {
        mostrarSpinner();
      },
      success: function(response) {
        $('#section-content').html(response.html);
      },
      error: function() {
        $('#section-content').html('<p>Hubo un error al cargar los datos.</p>');
      },
      complete: function() {
        ocultarSpinner();
      }
    });
  });
});
