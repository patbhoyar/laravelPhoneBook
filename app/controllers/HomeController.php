<?php

use lib\libraries\fpdf\fpdf as FPDFLib;
use lib\Classes\ExportData as Export;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
        $users = User::orderBy('lastName', 'asc')->get();
        return View::make('index', array('users' => $users));
	}

    public function exportPdf(){

        $pdf = new FPDFLib('L');

        $pdf->SetMargins(10,10,10);
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',21);
        $pdf->Cell(0,14, 'All Contacts','B', 1, 'C');
        $pdf->Cell(0,14, '','', 1, 'C');

        $pdf->SetFont('Arial','',14);

        for ($i=0; $i < 4; $i++) {
            if ($i === 0) {
                $pdf->Cell(95,12, "sdsds",'TLBR', 0, 'C');
                $pdf->Cell(95,12, "23232323",'TBR', 1, 'C');
            }else{
                $pdf->Cell(95,12, "sdsdsd",'LBR', 0, 'C');
                $pdf->Cell(95,12, "23232323",'BR', 1, 'C');
            }
        }
        $pdf->Output();
//$pdf->Output('contacts.pdf', 'D');
    }

    public function exportCsv()
    {
        $contacts = array_values(User::all()->toArray());
        //dd($contacts);
        Export::CSV($contacts);
        return View::make('downloads');
    }


}