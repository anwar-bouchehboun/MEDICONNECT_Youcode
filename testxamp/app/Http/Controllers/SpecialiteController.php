<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $specialite = Specialite::paginate(5);
        // $specialite = Specialite::all();

        return view('admin.specialite.index',['specialite' => $specialite]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.specialite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'specialite' => 'required|regex:/^[a-zA-Z\s\-\'\.\,\(\)]+$/|max:255'
        ]);

        Specialite::create([
            'specialite' => $request->specialite
        ]);

        return redirect()->route('specialite.index')->with('success', 'Spécialité ajoutée avec succès!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Specialite $specialite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialite $specialite)
    {
        return view('admin.specialite.edit', compact('specialite'));
    }


    public function update(Request $request, Specialite $specialite)
    {
        $request->validate([
            'specialite' => 'required|string|max:255',
        ]);

        $specialite->update([
            'specialite' => $request->specialite,
        ]);

        return redirect()->route('specialite.index')->with('success', 'Spécialité mise à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialite $specialite)
    {

        $specialite->delete();

        return redirect()->route('specialite.index')->with('success', 'Spécialité supprimée avec succès.');
    }

}
