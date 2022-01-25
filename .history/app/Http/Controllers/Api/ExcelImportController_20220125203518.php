<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Models\StoreExcel;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function import(Request $request) 
    {
        Excel::import(new StoreExcel, $request->file('file')->store('temp'));
        return back();
    }
}
