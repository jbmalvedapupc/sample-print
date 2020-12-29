<?php

namespace App\Http\Controllers;

use App\Employee;
use PDF;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function exportToPDF()
    {
        // retreive all records from db
        $employees = Employee::all();

        // share data to view
        view()->share('employees',$employees);
        $pdf = PDF::loadView('employees.index', $employees);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
