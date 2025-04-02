<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintCode extends Model
{
    use HasFactory;

    protected $table = 'print_codes'; // Ensure this matches the actual table name
    protected $fillable = ['permit_code', 'year', 'sequence'];
}

