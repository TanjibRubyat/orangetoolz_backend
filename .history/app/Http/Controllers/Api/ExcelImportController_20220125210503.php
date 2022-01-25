<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\StoreExcel;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        // $validator = \Validator::make($request->all(),[
        //     'file' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     $response['response'] = $validator->messages();
        // } else {
           // Excel::import(new StoreExcel, $request->file('file'));
            //return "Done";
        //}

        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }
}
