<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Specialite;
use App\Models\Reservation;
use Faker\Extension\CompanyExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialite = Specialite::all();

        return view('patient.reservation', compact('specialite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function filtrer(Request $request)
    {
        $specialite_id = $request->input('specialite_id');

        $medecin = User::where('specialite_id', $specialite_id)->get();
        $specialite = Specialite::all();
        return view('patient.reservation', compact('specialite', 'medecin', 'specialite_id'));

    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'medecin_id' => 'required',
    //         'date' => 'required|date',
    //         'status' => 'required',
    //     ]);

    //     $providedDate = new DateTime($request->date);
    //     $currentDate = new DateTime();

    //     if ($providedDate < $currentDate) {
    //         return redirect()->back()->withErrors(['date' => 'Please choose a date in the future.']);
    //     }


    //     $existingReservation = Reservation::where('medecin_id', $request->medecin_id)
    //                                        ->where('date', $request->date)
    //                                        ->exists();

    //     if ($existingReservation) {
    //         return back()->withInput()->withErrors(['date' => 'A reservation for this date already exists. Please choose a different date.']);
    //     }

    //  $r=   Reservation::create([
    //         'patient_id' => Auth::id(),
    //         'medecin_id' => $request->medecin_id,
    //         'date' => $request->date,
    //         'status' => $request->status,
    //     ]);
    //     return redirect()->route('patient')->with('success', 'Vous avez ajouté une Medicament avec succès.');

    // }
    // Assurez-vous d'importer le modèle Reservation en haut de votre fichier

    public function store(Request $request)
    {


        $request->validate([
            'date' => 'required|date',
            'status' => 'required',
            // 'specialite_id' => 'required',

        ]);

        $providedDate = new DateTime($request->date);
        $currentDate = new DateTime();

        if ($providedDate < $currentDate) {
            return redirect()->back()->withErrors(['date' => 'Please choose a date in the future.']);
        }

        // Vérifie si le rendez-vous est d'urgence
        if ($request->status == 'urgence') {
            // Trouver un médecin disponible pour cette date et dans la spécialité sélectionnée
            $medecinDisponible = User::whereDoesntHave('reservations', function ($query) use ($request) {
                $query->where('date', $request->date);
            })
                ->where('role', 'medecin')
                ->whereHas('specialite', function ($query) use ($request) {
                    $query->where('specialite_id', $request->input('specialite_id'));
                })
                ->first();
            if (!$medecinDisponible) {
                return back()->withInput()->withErrors(['date' => 'No doctor available for this date and specialty. Please choose another date.']);
            }

            $medecinId = $medecinDisponible->id;
        } else {
            // Pour les rendez-vous normaux, récupère l'identifiant du médecin sélectionné
            $request->validate([
                'medecin_id' => 'required',
            ]);
            $medecinId = $request->medecin_id;

            $existingReservation = Reservation::where('medecin_id', $medecinId)
                ->where('date', $request->date)
                ->exists();

            if ($existingReservation) {
                return back()->withInput()->withErrors(['date' => 'A reservation for this date already exists for this doctor. Please choose a different date or doctor.']);
            }
        }

        // Crée la réservation
        $reservation = Reservation::create([
            'patient_id' => Auth::id(),
            'medecin_id' => $medecinId,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        return redirect()->route('patient')->with('success', 'Vous avez ajouté une réservation avec succès.');
    }




    public function show($user)
    {
    $medecin=User::findOrFail($user);
    return view('patient.show',compact('medecin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}