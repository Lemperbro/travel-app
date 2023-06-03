<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isPhpEnabled', true); 
        $dompdf = new Dompdf($options);


        $additionalHtml = file_get_contents( resource_path('views/new.blade.php'));
        $html = $additionalHtml;
        $dompdf->loadHtml($html);

        
        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        return $dompdf->stream('laporan.pdf');
    }
}
