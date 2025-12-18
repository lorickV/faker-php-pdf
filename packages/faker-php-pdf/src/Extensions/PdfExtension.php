<?php

namespace Xefi\Faker\Pdf\Extensions;

use Random\Randomizer;
use Xefi\Faker\Extensions\Extension;
use Xefi\Faker\Pdf\Providers\PdfManagerProvider;

class PdfExtension extends Extension
{
    private PdfManagerProvider $pdfProvider;

    public function __construct(Randomizer $randomizer)
    {
        $this->pdfProvider = new PdfManagerProvider();
        parent::__construct($randomizer);
    }

    public function pdf(string $text = 'Hello World', int $pages = 1, string $orientation = 'portrait'): string
    {
        $html = $this->buildHtml($text, $pages);
        $path = sys_get_temp_dir().'/fake_'.uniqid().'.pdf';

        $domPdf = $this->pdfProvider->getDomPdf();

        $domPdf->setPaper('A4', $orientation);
        $domPdf->loadHtml($html);
        $domPdf->render();

        file_put_contents($path, $domPdf->output());

        return $path;
    }

    private function buildHtml(string $text, int $pages): string
    {
        $html = '<html><body>';

        for($i = 0; $i < $pages; $i++) {
            $html .= '<div style="page-break-after: always; text-align:center; margin-top:40vh;">'
                .htmlspecialchars($text).
                '</div>';
        }

        $html .= '</body></html>';

        return $html;
    }
}
