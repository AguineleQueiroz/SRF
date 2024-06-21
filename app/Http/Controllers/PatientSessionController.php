<?php


namespace App\Http\Controllers;

use App\Models\PatientSession;
use Illuminate\Http\Request;

class PatientSessionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'pain' => 'nullable|string',
            'avds' => 'nullable|string',
            'osteomuscular_conditions' => 'nullable|string',
            'neurological_conditions' => 'nullable|string',
            'urogynecological_conditions' => 'nullable|string',
            'cardiovascular_conditions' => 'nullable|string',
            'respiratory_conditions' => 'nullable|string',
            'oncological_conditions' => 'nullable|string',
            'pediatrics' => 'nullable|string',
            'multiple_disabilities' => 'nullable|string',
            'patient_complaint' => 'nullable|string',
            'physical_exam_findings' => 'nullable|string',
            'standardized_tests' => 'nullable|string',
            'functional_condition' => 'nullable|string',
            'environmental_factors' => 'nullable|string',
            'physiotherapeutic_diagnosis' => 'nullable|string',
            'current_activities' => 'nullable|string',
            'past_activities' => 'nullable|string',
        ]);

        $patientSession = PatientSession::create($data);

        return response()->json($patientSession, 201);
    }

    // Adicione mais métodos para atualizar, deletar e visualizar sessões, conforme necessário.
}
