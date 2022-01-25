<?php

namespace App\Imports;

use App\Models\StoreExcel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StoreImport implements ToModel, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StoreExcel([            
            'region' => $row[0],
            'country' => $row[1],
            'item' => $row[2],
            'type' => $row[3],
            'sales_channel' => $row[4],
            'order_priority' => $row[5],
            'order_date' => $row[6],
            'order_id' => $row[7],
            'ship_date' => $row[8],
            'units_sold' => $row[9],
            'unit_price' => $row[10],
            'unit_cost' => $row[11],
            'total_pevenue' => $row[12],
            'total_cost' => $row[13],
            'total_profit' => $row[14],
        ]);

    }
}
