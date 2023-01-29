<?php
namespace App\Controllers;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Reader\Word2007;
use Symfony\Component\Routing\RouteCollection;

class FileController
{
    private string $filename;

    public function __construct($filename, $extension)
    {
        if($extension == 'pdf'){
            $this->convertToPdf($filename);
        }
    }

    public function convertToPdf($filename)
    {
        //set dompdf path
        $domPdfPath = realpath(PHPWORD_BASE_DIR . '/../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        $reader = new Word2007();

        $wordDocument = $reader->load($filename);

        $writer = IOFactory::createWriter($wordDocument, 'PDF');

        $writer->save($filename . '.pdf');
        $this->filename = $filename . '.pdf';
        return $this;
    }
    
	/**
	 * @return string
	 */
	public function getFilename(): string {
		return $this->filename;
	}
}