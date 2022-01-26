<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreExcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'first_name',
        'last_name',
        'email',
        'state',
        'zip',
        
    ];
}
