<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PacienteController extends Controller
{
    // 🟢 Mostrar el formulario de registro
    public function registro()
    {
        return view('pacientes.registro');
    }

    // 🟢 Guardar un nuevo paciente
    public function registrar(Request $request)
    {
        $request->validate([
            'dni' => 'required|max:20|unique:pacientes',
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'email' => 'required|email|unique:pacientes',
            'password' => 'required|min:6|confirmed',
        ]);

        Paciente::create([
            'dni' => $request->dni,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('pacientes.login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    // 🟢 Mostrar el formulario de login
    public function login()
    {
        return view('pacientes.login');
    }

    // 🟢 Procesar el login
    public function autenticar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $paciente = Paciente::where('email', $request->email)->first();

        if (!$paciente || !Hash::check($request->password, $paciente->password)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas.'])->onlyInput('email');
        }

        // Guardar datos del paciente en la sesión
        Session::put('paciente', $paciente);

        return redirect()->route('pacientes.panel');
    }

    // 🟢 Mostrar el panel del paciente (solo si está logueado)
    public function panel()
    {
        if (!Session::has('paciente')) {
            return redirect()->route('pacientes.login')->withErrors(['auth' => 'Por favor inicia sesión.']);
        }

        $paciente = Session::get('paciente');
        return view('pacientes.panel', compact('paciente'));
    }

    // 🟢 Cerrar sesión
    public function logout()
    {
        Session::forget('paciente');
        return redirect()->route('pacientes.login')->with('success', 'Has cerrado sesión correctamente.');
    }
}
