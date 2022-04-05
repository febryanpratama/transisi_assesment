<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use Illuminate\Http\Request;
use Excel;

class ImportController extends Controller
{
    //
    public function importform(){
        return view('import-form');
    }

    public function import(Request $request){
        \Excel::import(new EmployeeImport, $request->file);
        return "Succesfully import";
    }
}
