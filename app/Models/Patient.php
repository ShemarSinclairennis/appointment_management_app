<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'first_name',
        'last_name',
        'middle_initial',
        'marital_status',
        'gender',
        'dob',
        'street_address',
        'city',
        'parish',
        'home_phone',
        'cell_phone',
        'email',
        'occupation',
        'employer',
        'employer_number',
        'emergency_name',
        'emergency_home_phone',
        'emergency_cell_phone',
        'ip_address'

    ];
}
