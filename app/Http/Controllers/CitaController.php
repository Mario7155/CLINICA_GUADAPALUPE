<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CitaController extends Controller
{
    public function index()
    {
        if (!Session::has('paciente')) {
            return redirect()->route('pacientes.login');
        }

        $paciente = Session::get('paciente');
        $citas = Cita::where('id_paciente', $paciente->id_paciente)->get();

        return view('citas.index', compact('citas', 'paciente'));
    }

    public function create()
    {
        if (!Session::has('paciente')) {
            return redirect()->route('pacientes.login');
        }

        return view('citas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'nullable|max:200'
        ]);

        $paciente = Session::get('paciente');

        Cita::create([
            'id_paciente' => $paciente->id_paciente,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita registrada correctamente.');
    }

    public function cancelar($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->update(['estado' => 'cancelada']);
        return redirect()->route('citas.index')->with('success', 'Cita cancelada.');
    }
}
