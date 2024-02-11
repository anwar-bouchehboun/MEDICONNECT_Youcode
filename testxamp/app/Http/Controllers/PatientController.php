<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialite;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        return view('patient.Dashbord');
    }
 


}
