<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommeantaireController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
     $request->validate([
       'contenu',
      'rating',
     'medecin_id',
     ]);
     Commentaire::create([
        'patient_id'=>Auth::id(),
        'contenu'=>$request->contenu,
        'rating'=>$request->rating,
       'medecin_id'=>$request->medecin_id,
      ]);
      return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}