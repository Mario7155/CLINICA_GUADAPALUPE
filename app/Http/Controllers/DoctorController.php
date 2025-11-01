<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DoctorController extends Controller
{
    public function index()
    {
        $doctores = Doctor::all();

        return view('doctores.index', compact('doctores'));
    }

    public function create()
    {
        return view('doctores.create');
    }
}
