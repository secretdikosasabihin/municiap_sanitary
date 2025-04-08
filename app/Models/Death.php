<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;
    protected $fillable = [
        'province', 'municipality', 'first_name', 'middle_name', 'last_name',
        'sex', 'date_of_death', 'birthdate', 'age', 'place_of_death', 'civil_status',
        'religion', 'citizenship', 'residence', 'occupation', 'name_of_father',
        'name_of_mother', 'cause_of_death_a', 'cause_of_death_b', 'cause_of_death_c', 'cause_of_death_d',
        'doctor', 'address', 'date', 'reviewed_by', 'informant_name', 'relationship',
        'informant_address', 'prepared_by_name', 'prepared_by_position', 'remarks', 'reviewed_position', 'doctor_position'
    ];
}
