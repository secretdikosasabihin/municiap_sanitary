<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HealthCard extends Model
{
    use HasFactory;

    protected $table = 'health_card'; // Make sure this matches your actual table name!

    protected $fillable = [
        'full_name',
        'health_card_type',
        'age',
        'gender',
        'place_of_employment',
        'designation',
        'barangay',
        'inspector_name',
        'date_of_issuance',
        'date_of_expiration',
        'print_code'
    ];

    protected $casts = [
        'date_of_issuance' => 'datetime',
    ];

    public static function generatePrintCode()
    {
        $year = now()->year;
        
        // Find the last record for the current year
        $latestRecord = self::whereYear('created_at', $year)->latest('id')->first();

        if ($latestRecord && $latestRecord->print_code) {
            $lastNumber = (int)substr($latestRecord->print_code, -4);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001'; // Start from 0001 if no records exist
        }

        return "$year-$newNumber";
    }
}

