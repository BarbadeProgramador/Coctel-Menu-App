<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carta de Cocteles</title>
  <style>
    /* Reset y estilos básicos */
    body {
      font-family: Arial, sans-serif;
      font-size: 12pt;
      background-color: white;
      margin: 0;
      padding: 20px;
    }
    h1 {
      text-align: center;
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }

    /* Contenedor de tarjetas usando Flexbox; Dompdf 2.x tiene soporte básico para flex */
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 20px;
    }
    
    /* Cada tarjeta ocupará aproximadamente el 23-25% del ancho para que se vean 4 en fila.
       Se usa box-sizing para que el padding y border se incluyan en el cálculo */
    .coctel-card {
      box-sizing: border-box;
      width: calc(25% - 15px); /* Ajusta según el gap que uses */
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 20px;
      background-color: #fff;
      /* Propiedades de flex se usan solo para distribución; si se presentan problemas,
         puedes cambiar a un layout basado en floats o columnas CSS */
    }
    
    .coctel-card img {
      width: 100%;
      height: auto;
      display: block;
    }
    
    .coctel-card .name {
      font-weight: bold;
      font-size: 16pt;
      margin-top: 10px;
      text-align: center;
    }
    
    .coctel-card .info {
      font-size: 12pt;
      color: #555;
      margin-top: 5px;
    }
    
    .coctel-card .info strong {
      color: #333;
    }
    
    /* Para asegurarnos de que en impresión no se rompan los bloques */
    @media print {
      .coctel-card {
        page-break-inside: avoid;
      }
    }
  </style>
</head>
<body>
  <h1>Carta de Cocteles</h1>
  <div class="container">
    @foreach($cocteles as $coctel)
      <div class="coctel-card">
        <img src="{{ $coctel['img'] }}" alt="{{ $coctel['nombre'] }}">
        <h3 class="name">{{ $coctel['nombre'] }}</h3>
        <p class="info"><strong>Bebida:</strong> {{ $coctel['bebida'] }}</p>
        <p class="info"><strong>Ingredientes:</strong>
          @foreach($coctel->ingredientes as $ingrediente)
            {{ $ingrediente->nombre }}@if(!$loop->last), @endif
          @endforeach
        </p>
        <p class="info"><strong>Tipo:</strong> {{ $coctel['tipo'] }}</p>
        <p class="info"><strong>Precio:</strong> {{ $coctel['precio'] }}</p>
      </div>
    @endforeach
  </div>
</body>
</html>
