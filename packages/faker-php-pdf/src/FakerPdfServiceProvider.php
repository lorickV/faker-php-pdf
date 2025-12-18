<?php

namespace Xefi\Faker\Pdf;

use Xefi\Faker\Pdf\Extensions\PdfExtension;
use Xefi\Faker\Providers\Provider;

class FakerPdfServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            PdfExtension::class
        ]);
    }
}
