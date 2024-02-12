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
        // $specialite = Specialite::all();

        return view('patient.urgence');
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




    public function store(Request $request)
    {


        $request->validate([
            'date' => 'required|date',
            'status' => 'required',

        ]);

        $providedDate = new DateTime($request->date);
        $currentDate = new DateTime();

        if ($providedDate < $currentDate) {
            return redirect()->back()->withErrors(['date' => 'Please choose a date in the future.']);
        }

        if ($request->status == 'urgence') {
            $medecinDisponible = User::select('users.*')
            ->join('specialites', 'users.specialite_id', '=', 'specialites.id')
            ->leftJoin('reservations', function ($join) use ($request) {
                $join->on('users.id', '=', 'reservations.medecin_id')
                     ->where('reservations.date', $request->date);
            })
            ->whereNull('reservations.medecin_id')
            ->where('users.role', 'medecin')
            ->where('specialites.specialite', "Médecine d'urgence")
            ->first();

            if (!$medecinDisponible) {
                return back()->withInput()->withErrors(['date' => 'No doctor available for this date and specialty. Please choose another date.']);
            }

            $medecinId = $medecinDisponible->id;
        } else {
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
        return redirect()->back()->with('success', 'Vous avez ajouté une réservation avec succès.');

        // return redirect()->route('patient.index')->with('success', 'Vous avez ajouté une réservation avec succès.');
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