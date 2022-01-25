<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreExcel;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            Excel::import(new StoreExcel, $request->file('file'));
            return back();
        }
    }
}
