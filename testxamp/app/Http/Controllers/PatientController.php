<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialite;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){


$medecins = User::where('role', 'medecin')->get();

        return view('patient.Dashbord',compact('medecins'));
    }



}