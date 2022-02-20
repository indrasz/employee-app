<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function downloadPdf()
    {
    	$employee = Employee::all();
 
    	$pdf = PDF::loadView('pages.employee.myPDF', ['employee' => $employee]);
    	return $pdf->download('laporan-pegawai.pdf');
    }
}
