<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'pain',
        'avds',
        'osteomuscular_conditions',
        'neurological_conditions',
        'urogynecological_conditions',
        'cardiovascular_conditions',
        'respiratory_conditions',
        'oncological_conditions',
        'pediatrics',
        'multiple_disabilities',
        'patient_complaint',
        'physical_exam_findings',
        'standardized_tests',
        'functional_condition',
        'environmental_factors',
        'physiotherapeutic_diagnosis',
        'current_activities',
        'past_activities',
    ];
}
