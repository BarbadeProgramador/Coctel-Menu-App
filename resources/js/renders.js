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

  $.ajax({
    url: '/dashboard/section',
    method: 'GET',
    data: { section: 'seccion1' },
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

  // Manejo de clics en los botones del menú
 $('.menu-btn').on('click', function () {
  const section = $(this).data('section');
  const $button = $(this);

  // Acceder al ID del botón clickeado
  const buttonId = $button.attr('id');  

  console.log(buttonId)



  // Mostrar/ocultar secciones
  if (section === 'seccion2') {
    $('.section-count').removeClass('hidden');
    $('.form-excel').addClass('hidden');
  } else {
    $('.form-excel').removeClass('hidden');
    $('.section-count').addClass('hidden');
  }

  // AJAX para cargar contenido
  $.ajax({
    url: '/dashboard/section',
    method: 'GET',
    data: { section: section },
    beforeSend: function () {
      $('#spinner').removeClass('hidden');
    },
    success: function (response) {
      $('#section-content').html(response.html);
    },
    error: function () {
      $('#section-content').html('<p>Hubo un error al cargar los datos.</p>');
    },
    complete: function () {
      ocultarSpinner();
    }
  });
});

});