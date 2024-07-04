<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporteur;
use App\Models\Personnels;

class TransporteurController
{
    public function store(Request $request)
    {
        $transporteur = new Transporteur();
        $transporteur->id_personnels  = $request->id_personnel;
        $transporteur->save();
        return redirect()->route('listeTransporteurs')->with('success', 'Formulaire soumis avec succès!');
    }

    public function getTransporteurs()
    {
        $transporteurs = Transporteur::all();
        $personnelsIds = $transporteurs->pluck('id_personnels');
        $personnels = Personnels::whereIn('id', $personnelsIds)->get();
        return view('Administrateur/transporteur/listeTransporteurs', ['data' => $personnels]);
    }

    public function getTransporteurId($id)
    {
        $transporteur = Transporteur::find($id);
        return view('Administrateur/transporteur/listeTransporteurs', ['data' => $transporteur]);
    }

    public function deleteTransporteur($id)
    {
        $transporteur = Transporteur::where('id_personnels', $id)->first();
        $transporteur->delete();
        return redirect()->route('listeTransporteurs')->with('message', 'Transporteur a ete bien supprimé');
    }

    // public function updateTransporteur(Request $request, $id)
    // {
    //     $transporteur = Transporteur::find($id);
    //     $transporteur->id_personnels  = $request->id_personnels;
    //     $transporteur->update();
    //     return redirect()->route('listeTransporteurs')->with('message', 'Transporteur a ete bien modifié');
    // }

    public function ajouterTransporteur()
    {
        $personnels = Personnels::all();
        $transporteurs = Transporteur::all()->pluck('id_personnels');
        $personnels = Personnels::whereNotIn('id', $transporteurs)->get();
        return view('Administrateur/transporteur/ajouterTransporteur', ['data' => $personnels]);
    }
}
