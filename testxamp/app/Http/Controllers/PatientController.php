<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use App\Models\User;
use App\Models\Favorie;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PatientController extends Controller
{
    public function index()
    {
        $patientId = Auth::id();
        $Certaficat = Certificat::where('patient_id', $patientId)->get();

        return view('patient.Dashbord', compact('Certaficat'));
    }
    public function showDoctor()
    {
        $medecins = User::where('role', 'medecin')->get();
        $specialite = Specialite::all();
        return view('patient.listeDoctor', compact('medecins', 'specialite'));
    }
    public function show($user)
    {
        $medecin = User::findOrFail($user);

        return view('patient.reservation', compact('medecin'));
    }
    public function store(Request $request)
    {
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

    public function showFavoris()
    {
        $patientId = Auth::id();
        $favories = Favorie::where('patient_id', $patientId)->get();
        return view('patient.favoris', compact('favories'));

    }
    public function showCerficat($id)
    {
        $patientId = Auth::id();
        $Certaficat = Certificat::where('patient_id', $patientId)
            ->where('id', $id)
            ->get();

        // dd($Certaficat);
        // $pdf=PDF::loadView('patient.showCertaficat',compact('Certaficat'));
        // return $pdf->download('showCertaficat.pdf');
        return view('patient.showCertaficat', compact('Certaficat'));
    }
}