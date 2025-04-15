<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carta de Cocteles</title>
  <style>
    body {
      font-family: sans-serif;
      text-align: center;
    }
    h1 {
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    td {
      width: 33.33%;
      padding: 10px;
      vertical-align: top;
    }
    .card {
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
    }
    .card img {
      width: 100%;
      height: auto;
      max-height: 180px;
      object-fit: cover;
    }
    .name {
      font-weight: bold;
      margin: 10px 0 5px;
      font-size: 16px;
    }
    .info {
      font-size: 12px;
      text-align: left;
      margin: 5px 0;
    }
    .precio {
      font-size: 16px;
      font-weight: bold;
      color: green;
      margin-top: 8px;
    }
  </style>
</head>
<body>
  <h1>Carta de Cocteles</h1>
  <table>
    <tr>
      @foreach($cocteles as $index => $coctel)
        <td>
          <div class="card">
            <img src="{{ $coctel['img'] }}">
            <div class="name">{{ $coctel['nombre'] }}</div>
            <div class="info"><strong>Bebida:</strong> {{ $coctel['bebida'] }}</div>
            <div class="info"><strong>Ingredientes:</strong>
              @foreach($coctel->ingredientes as $ingrediente)
                {{ $ingrediente->nombre }}@if(!$loop->last), @endif
              @endforeach
            </div>
            <div class="info"><strong>Tipo:</strong> {{ $coctel['tipo'] }}</div>
            <div class="precio">${{ $coctel['precio'] }}</div>
          </div>
        </td>

        @if(($index + 1) % 3 === 0)
          </tr><tr>
        @endif
      @endforeach
    </tr>
  </table>
</body>
</html>
