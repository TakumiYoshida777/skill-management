<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; //ここお忘れなく

class PdfController extends Controller
{
    // public function viewPdf()
    // {
    //     $data = [
    //         'foo' => 'bar'
    //     ];
	// //ここでviewに$dataを送っているけど、
	// //今回$dataはviewで使わない
    //     $pdf = PDF::loadView('pdf.document', $data);

    //     return $pdf->download('document.pdf'); //生成されるファイル名
    // }
}
