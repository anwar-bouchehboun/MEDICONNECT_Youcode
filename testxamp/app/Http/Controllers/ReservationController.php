<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Specialite;
use App\Models\Commentaire;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Faker\Extension\CompanyExtension;

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



    public function store(Request $request)
    {


        $request->validate([
            // 'date' => 'required|date',
            // 'status' => 'required',
            'time' => 'required',
            'medecin_id' => 'required',
            'check' => 'required'
        ]);

        $existingReservation = Reservation::where('medecin_id', $request->medecin_id)
            ->where('time', $request->time)
            ->exists();

        if ($existingReservation) {
            return back()->withInput()->withErrors(['date' => 'No doctor available for this date and specialty. Please choose another date.']);
        }


        $insrt = Reservation::create([
            'patient_id' => Auth::id(),
            'medecin_id' => $request->medecin_id,
            'time' => $request->time,
            'check' => $request->check,
        ]);



        // $providedDateTime = Carbon::parse($request->date);
        // $heure = $providedDateTime->format('H');

        // $currentDateTime = Carbon::now();

        // if ($providedDateTime->lte($currentDateTime)) {
        //     return redirect()->back()->withErrors(['date' => 'Please choose a date and time in the future.']);
        // }




        // if ($request->status === 'urgence') {
        //     // Find a doctor available for emergency
        //     $medecinDisponible = User::select('users.*')
        //         ->join('specialites', 'users.specialite_id', '=', 'specialites.id')
        //         ->leftJoin('reservations', function ($join) use ($request) {
        //             $join->on('users.id', '=', 'reservations.medecin_id')
        //                 ->where('reservations.date', $request->date);
        //         })
        //         ->whereNull('reservations.medecin_id')
        //         ->where('users.role', 'medecin')
        //         ->where('specialites.specialite', "Médecine d'urgence")
        //         ->first();

        //     if (!$medecinDisponible) {
        //         return back()->withInput()->withErrors(['date' => 'No doctor available for this date and specialty. Please choose another date.']);
        //     }


        //     // Assign the available doctor for emergency
        //     $medecinId = $medecinDisponible->id;
        // } else {
        //     $request->validate([
        //         'medecin_id' => 'required',
        //     ]);
        //     $oneHourBefore = $providedDateTime;
        //     $oneHourAfter = $providedDateTime->subHour();

        //     $reservationsWithinRange = Reservation::whereBetween('date', [$oneHourBefore, $oneHourAfter])
        //         ->where('medecin_id', $request->medecin_id)
        //         ->exists();


        //     if ($reservationsWithinRange) {
        //         return back()->withInput()->withErrors(['date' => 'There is already a reservation within one hours of this time.']);
        //     }
        //     $medecinId = $request->medecin_id;

        //     $existingReservation = Reservation::where('medecin_id', $medecinId)
        //         ->where('date', $request->date)
        //         ->exists();

        //     if ($existingReservation) {
        //         return back()->withInput()->withErrors(['date' => 'A reservation for this date already exists for this doctor. Please choose a different date or doctor.']);
        //     }
        // }

        // If all validations pass, create the reservation
        // $reservation = Reservation::create([
        //     'patient_id' => Auth::id(),
        //     'medecin_id' => $medecinId,
        //     'date' => $providedDateTime,
        //     'status' => $request->status,
        // ]);

        return redirect()->back()->with('success', 'You have successfully added a reservation.');
    }



    public function calculerRatingMedecin($medecinId)
    {
        $averageRating = Commentaire::where('medecin_id', $medecinId)
            ->select(DB::raw('AVG(rating) AS average_rating'))
            ->groupBy('medecin_id')
            ->first();
        if ($averageRating == null) {
            return null;
        }
        return $averageRating->average_rating;
    }



    public function show($user)
    {
        $medecin = User::findOrFail($user);
        $averageRating = $this->calculerRatingMedecin($user);
        $commentaires = Commentaire::where('medecin_id', $medecin->id)->get();

        return view('patient.show', compact('medecin', 'commentaires', 'averageRating'));
    }


    public function filtrer(Request $request)
    {
        $specialite_id = $request->input('specialite_id');
        $medecins = User::where('specialite_id', $specialite_id)->get();

        $specialite = Specialite::all();
        return view('patient.listeDoctor', compact('specialite', 'medecins'));

    }






    public function reserveurgence(Request $request)
    {

        $currentTime = Carbon::now();
        $heureCarbon = Carbon::parse($currentTime);
        $heureDebut = $heureCarbon->format('H') . 'h';
        $heureFin = $heureCarbon->addHour()->format('H') . 'h'; 

        $plageHoraire = $heureDebut . '-' . $heureFin;

        $specialiteName = 'Médecine d\'urgence';

        $doctors = Specialite::select('specialites.specialite', 'users.name')
            ->join('users', 'specialites.id', '=', 'users.specialite_id')
            ->where('users.role', 'medecin')
            ->where('specialites.specialite', $specialiteName)
            ->groupBy('specialites.specialite', 'users.name')
            ->get();

        $availableDoctors = [];
foreach ($doctors as $doctor) {
    $reservations = Reservation::where('medecin_id', $doctor->id)
                                ->where('time', $plageHoraire)
                                ->where('check', 0)
                                ->count();
    if ($reservations == 0) {
        dd($doctor);
        $availableDoctors[] = $doctor;
    }}
        //   $reserve=  Reservation::where('time',$plageHoraire)->get();



         $time=$request->input('time');
         dd($time);

    }
}