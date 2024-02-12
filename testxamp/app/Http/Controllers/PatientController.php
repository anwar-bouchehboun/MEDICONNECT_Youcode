<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Favorie;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index(){


$medecins = User::where('role', 'medecin')->get();

        return view('patient.Dashbord',compact('medecins'));
    }
    public function show( $user)
    {

        $medecin = User::findOrFail($user);

    return view('patient.reservation',compact('medecin'));
    }
    public function store(Request $request) {
        // Validation des données de la requête
        $request->validate([
            'medecin_id' => 'required'
        ]);

        // Vérifier si le médecin est déjà favori pour ce patient
        $isFavorite = Favorie::where('patient_id', Auth::id())
                             ->where('medecin_id', $request->medecin_id)
                             ->exists();

        if (!$isFavorite) {
            // Ajouter le médecin aux favoris du patient
            $favoris = new Favorie();
            $favoris->patient_id = Auth::id();
            $favoris->medecin_id = $request->medecin_id;
            $favoris->save();

            // Rediriger avec un message de succès
            return back()->withSuccess('Médecin ajouté aux favoris avec succès.');
        } else {
            // Le médecin est déjà favori pour ce patient
            // Rediriger avec un message d'erreur
            return back()->withErrors('Ce médecin est déjà ajouté aux favoris.');
        }
    }


}