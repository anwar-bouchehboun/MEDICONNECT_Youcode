<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedecinController extends Controller
{
    public function index()
    {
        $consultation = Certificat::where('medecin_id', Auth::id())->get();
        return view('medecin.Dashbord', compact('consultation'));
    }
    public function create()
    {

    }
    public function ReservationPatient()
    {
        $reserve = Reservation::where('medecin_id', Auth::id())->get();

        return view('medecin.reservationpation', compact('reserve'));
    }
    public function show($cons)
    {

        $con = Certificat::with('patient')->find($cons);
        // dd($con);
        return view('medecin.personne', ['con' => $con]);

    }
    // public function persone(Reservation $con)
    // {
    //     dd($con);
    //     return view('medecin.personne', compact('con'));

    // }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => "required",
            'nomberjr' => "required|integer",
            'date_consultation' => "required"
        ]);
        Certificat::create([
            'patient_id' => $request->patient_id,
            'nomberjr' => $request->nomberjr,
            'date_consultation' => $request->date_consultation,
            'medecin_id' => Auth::id()
        ]);
        return redirect()->route('medecin.index')->with('success', 'Vous avez ajouté une Medicament avec succès.');

    }
    public function edit(Reservation $consultion)
    {

        return view('medecin.certficat', compact('consultion'));
    }

}
