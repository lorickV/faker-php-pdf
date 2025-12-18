<?php

namespace Xefi\Faker\Pdf\Providers;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfManagerProvider
{
    private ?Dompdf $pdf = null;

    public function gengeterate(string $html, string $path, string $orientation = 'portrait'): void
    {
        $pdf = $this->getPdf();

        $pdf->setPaper('A4', $orientation);
        $pdf->loadHtml($html);
        $pdf->render();

        file_put_contents($path, $pdf->output());
    }

    public function getDomPdf(): Dompdf
    {
        if ($this->pdf === null) {
            $this->pdf = new Dompdf();
        }

        return $this->pdf;
    }
}
