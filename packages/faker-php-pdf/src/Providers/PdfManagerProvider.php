<?php

namespace Xefi\Faker\Pdf\Providers;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfManagerProvider
{
    private ?Dompdf $pdf = null;

    public function getDomPdf(): Dompdf
    {
        if ($this->pdf === null) {
            $this->pdf = new Dompdf();
        }

        return $this->pdf;
    }
}
