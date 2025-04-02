<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanitary extends Model
{
    use HasFactory;
    protected $table = 'sanitary';

    protected $fillable = [
        'name_of_establishment', 'name_of_owner', 'contact_number', 'barangay',
        'line_of_business', 'renewal_year', 'permit_code', 'status', 'confirmed', 'last_updated_by', 'inspector_name'
    ];

    protected $casts = [
        'renewed_at' => 'datetime',
    ];

    public function latestStatus()
    {
        return $this->hasOne(SanitaryStatusHistory::class)->latestOfMany();
    }
    


}


