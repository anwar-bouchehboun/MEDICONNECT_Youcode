<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medicament;
use App\Models\Specialite;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $specialitesCount = Specialite::count();
        $medicamentsCount = Medicament::count();
        $patientCount = User::where('role', 'patient')->count();
        $medecinCount = User::where('role', 'medecin')->count();

        return view('admin.Dashbord', compact('specialitesCount', 'medicamentsCount', 'patientCount', 'medecinCount'));
    }

}