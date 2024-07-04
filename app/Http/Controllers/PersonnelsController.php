<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnels;

class PersonnelsController 
{
    //
    public function store(Request $request)
    {
        $personnel = new Personnels();

        $personnel->nom  = $request->nom;
        $personnel->prenom  = $request->prenom;
        $personnel->email  = $request->adresseE;
        $personnel->num_tel  = $request->telephone;
        $personnel->adresse  = $request->address;
        $personnel->poste  = $request->poste;
        $personnel->date_obtention  = $request->obtention;
        $personnel->save();

        return redirect()->route('listePersonnels')->with('success', 'Formulaire soumis avec succès!');
    }


    public function getPersonnel()
    {
        $personnel = Personnels::all();
        return view('Administrateur/personnels/listePersonnels', ['data' => $personnel]);
    }


    public function deletePersonnel($id)
    {
        $personnel = Personnels::find($id);
        $personnel->delete();
        return redirect()->route('listePersonnels')->with('message', 'Projet a ete bien supprimé');
    }

    public function updatePersonnel(Request $request, $id)
    {
        $personnel = Personnels::find($id);
        $personnel->nom = $request->nom;
        $personnel->prenom = $request->prenom;
        $personnel->email = $request->adresseE;
        $personnel->num_tel = $request->telephone;
        $personnel->adresse = $request->address;
        $personnel->poste = $request->poste;
        $personnel->date_obtention = $request->obtention;
        $personnel->update();
        return redirect()->route('listePersonnels')->with('message', 'Projet a ete bien modifié');
    }

    public function index(Request $request)
    {
        return redirect()->route('listePersonnel')->with('success', 'Formulaire soumis avec succès!');
    }

    public function indexPersonnel(Request $request)
    {
        return redirect()->route('listePersonnel');
    }

    public function getPersonnelId($id)
    {
        $personnel = Personnels::find($id);
        return view('Administrateur/personnels/modifierPersonnel', ['personnel' => $personnel]);
    }

    public function listePersonnel()
    {
        $personnels = Personnels::all();
        return view('Administrateur/personnels/listePersonnels', ['data' => $personnels]);
    }
}
