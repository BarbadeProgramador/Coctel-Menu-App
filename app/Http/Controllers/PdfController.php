<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coctel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends Controller
{
    public function descargarPdf()
    {
        // Obtener los cocteles con sus ingredientes
        $cocteles = Coctel::with('ingredientes')->get();

        // Configuración de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true); // Habilitar el uso de HTML5ç
        $options->set('isRemoteEnabled', true);
        $options->set('isPhpEnabled', true); // Habilitar el uso de PHP en el HTML
        $dompdf = new Dompdf($options);

        // Generar el contenido HTML con los datos de los cócteles
        $html = view('pdf.informe', compact('cocteles'))->render();

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Definir el tamaño de la página
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF generado
        return $dompdf->stream('informe.pdf');
    }
}
