<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
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
            //  'date' => 'required|date',
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
            'date' => now()
        ]);


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
    {    //array medecin
        $medecin = User::findOrFail($user);
        $averageRating = $this->calculerRatingMedecin($user);
        $commentaires = Commentaire::where('medecin_id', $medecin->id)->get();
        $certafica = Certificat::where('patient_id', Auth::id())
            ->where('medecin_id', $medecin->id)->count();

        return view('patient.show', compact('medecin', 'commentaires', 'averageRating', 'certafica'));
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
        $request->validate([
            'check' => 'required'
        ]);

        $currentTime = Carbon::now();
        $heureDebut = $currentTime->format('H') . 'h';
        $heureFin = $currentTime->addHour()->format('H') . 'h';
        $plageHoraire = $heureDebut . '-' . $heureFin;

        $specialiteName = 'Médecine d\'urgence';

        $doctors = Specialite::select('specialites.specialite', 'users.id')
            ->join('users', 'specialites.id', '=', 'users.specialite_id')
            ->where('users.role', 'medecin')
            ->where('specialites.specialite', $specialiteName)
            ->groupBy('specialites.specialite', 'users.id')
            ->get();
            $allReservationsComplete = true;
        foreach ($doctors as $doctor) {
            $existingReservations = Reservation::where('medecin_id', $doctor->id)
                ->where('time', $plageHoraire)
                ->count();

            if ($existingReservations === 0) {
                $allReservationsComplete = false;
                $r = Reservation::create([
                    'patient_id' => Auth::id(),
                    'medecin_id' => $doctor->id,
                    'date' => now(),
                    'time' => $plageHoraire,
                    'check' => $request->check
                ]);
                return redirect()->back()->with('success', 'You have successfully added a reservation sur palace');

            }
        }

        // Si aucun médecin n'est disponible à l'heure demandée, essayez l'heure suivante
        $currentTime = now()->addHour();
        $heureDebut = $currentTime->format('H') . 'h';
        $heureFin = $currentTime->addHour()->format('H') . 'h';
        $plageHoraire = $heureDebut . '-' . $heureFin;

        // Répétez le processus pour les médecins disponibles à cette heure
        foreach ($doctors as $doctor) {
            $existingReservations = Reservation::where('medecin_id', $doctor->id)
                ->where('time', $plageHoraire)
                ->count();

            if ($existingReservations === 0) {
                $allReservationsComplete = false;
                $r = Reservation::create([
                    'patient_id' => Auth::id(),
                    'medecin_id' => $doctor->id,
                    'date' => now(),
                    'time' => $plageHoraire,
                    'check' => $request->check
                ]);
                return redirect()->back()->with('success', 'You have successfully added a reservation plus 1h ');
            }
        }
        if ($allReservationsComplete) {
            return redirect()->back()->with('error', 'All reservations are complete for today.');
        }
    }
    // --------------------------
//     public function reserveurgence(Request $request)
// {
//     $request->validate([
//         'check' => 'required'
//     ]);

//         // Define the start and end times for the reservation period
//     $startTime = Carbon::createFromTime(9, 0, 0); // 9 am
//     $endTime = Carbon::createFromTime(17, 0, 0);  // 5 pm

//         // Initialize a flag to track if any reservations are available
//     $allReservationsComplete = true;

//         // Iterate through each hour within the reservation period
//     while ($startTime <= $endTime) {
//         $heureDebut = $startTime->format('H\h');
//         $heureFin = $startTime->addHour()->format('H\h');
//         $plageHoraire = $heureDebut . '-' . $heureFin;

//             // Fetch available doctors for the current time slot
//         $doctors = Specialite::select('specialites.specialite', 'users.id')
//             ->join('users', 'specialites.id', '=', 'users.specialite_id')
//             ->where('users.role', 'medecin')
//             ->where('specialites.specialite', 'Médecine d\'urgence')
//             ->groupBy('specialites.specialite', 'users.id')
//             ->get();

//             // Check availability for each doctor
//         foreach ($doctors as $doctor) {
//             $existingReservations = Reservation::where('medecin_id', $doctor->id)
//                 ->where('time', $plageHoraire)
//                 ->count();

//                 // If the doctor is available, create a reservation
//             if ($existingReservations === 0) {
//                 $allReservationsComplete = false;
//                 $r = Reservation::create([
//                     'patient_id' => Auth::id(),
//                     'medecin_id' => $doctor->id,
//                     'date' => now(),
//                     'time' => $plageHoraire,
//                     'check' => $request->check
//                 ]);
//                 return redirect()->back()->with('success', 'You have successfully added a reservation for ' . $plageHoraire);
//             }
//         }
//     }

//         // If all reservations are complete for the day, return an error message
//     if ($allReservationsComplete) {
//         return redirect()->back()->with('error', 'All reservations are complete for today.');
//     }
// }






}