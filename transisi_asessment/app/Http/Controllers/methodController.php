<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class methodController
{
    // Companiess
    public static function getCompany(){
        $data = company::paginate(5);
        return $data;
    }
    public static function createCompany($request){

        $destination = 'public/company';
        $logo = $request['logo'];
        $logo_name = $logo->getClientOriginalName();
        $path = $request['logo']->storeAs($destination, $logo_name);


        $request['logo'] = $logo_name;
 
        company::create($request);
    }

    public static function getId($id){
        return company::findOrFail($id);
    }
    public static function editCompany($request,$id)
    {

        $destination = 'public/company';
        $logo = $request['logo'];
        $logo_name = $logo->getClientOriginalName();
        $path = $request['logo']->storeAs($destination, $logo_name);


        $request['logo'] = $logo_name;
        // dd($request['name']);
 
        company::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'logo'=>$logo_name,
            'website'=>$request->website,
        ]);
    }
    public static function delete($id){
        return company::findOrFail($id)->delete();
    }


    // Employeess

    public static function getEmployee()
    {
        // $data =
        return employee::with('company')->paginate(5);
        return employee::get();
    }

    public static function createEmployee($request)
    {
        employee::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
        ]);
    }

    public static function getIdEmployee($id)
    {
        return employee::findOrFail($id);
    }

    public static function editEmployee($request,$id)
    {
        employee::where('id',$id)->update([
            'name'=>$request->name,
            'company_id'=>$request->company_id,
        ]);
    }
    public static function deleteEmployee($id){
        return employee::findOrFail($id)->delete();
    }

    public static function employeeByCompany($id)
    {
        $data = DB::table('employees')
        ->join('companies', 'employees.company_id', 'companies.id')
        ->where('company_id', $id)
        ->where('employees.deleted_at', NULL)
        ->select([
            'companies.*',
            'employees.name as name_employee',
        ])
        ->get();

        return $data;
    }


}
