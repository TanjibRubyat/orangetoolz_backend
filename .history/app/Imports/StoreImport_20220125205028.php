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
            'item_type' => $row[2],
            'sales_channel' => $row[3],
            'order_priority' => $row[4],
            'order_date' => $row[5],
            'order_id' => $row[6],
            'ship_date' => $row[7],
            'units_sold' => $row[8],
            'unit_price' => $row[9],
            'unit_cost' => $row[10],
            'total_pevenue' => $row[11],
            'total_cost' => $row[12],
            'total_profit' => $row[13],
        ]);

    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
