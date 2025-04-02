<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanitaryStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = ['sanitary_id', 'status', 'changed_by', 'changed_at'];

    protected $casts = [
        'changed_at' => 'datetime',
    ];

    public function sanitary()
    {
        return $this->belongsTo(Sanitary::class);
    }
}
