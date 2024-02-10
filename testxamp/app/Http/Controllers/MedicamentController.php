<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Specialite;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $specialite=  Specialite::all();
      $medicament=Medicament::paginate(5);
      return view('medicament.index',['specialite'=>$specialite,
      'medicament'=>$medicament
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'medicament'=>'string|required|max:255',
            'specialite_id'=>'required'
        ]);

        // dd( $request->all());
        Medicament::create([
            'medicament'=>$request->medicament,
            'specialite_id'=>$request->specialite_id
        ]);

         return redirect()->route('medicament.index')->with('success', 'Vous avez ajouté une Medicament avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Medicament $medicament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicament $medicament)
    {
        $specialites = Specialite::all();
        return view('medicament.edit', compact('medicament', 'specialites'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicament $medicament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicament $medicament)
    {
        //

   }
}