<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Personnels;

class EquipeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_personnel' => 'required|exists:personnels,id',
        ]);

        $equipe = new Equipe();
        $equipe->id_personnel = $validated['id_personnel'];
        $equipe->save();

        return redirect()->route('listeEquipes')->with('success', 'Équipe ajoutée avec succès!');
    }

    public function getEquipes()
    {
        $equipes = Equipe::all();
        $personnelsIds = $equipes->pluck('id_personnel');
        $personnels = Personnels::whereIn('id', $personnelsIds)->get();
        
        return view('Administrateur.equipe.listeEquipes', ['data' => $personnels]);
    }

    public function getEquipe($id)
    {
        $equipe = Equipe::find($id);
        
        if (!$equipe) {
            abort(404); // Handle case where equipe is not found
        }
        
        $personnel = Personnels::find($equipe->id_personnel);

        return view('Administrateur.equipe.detailEquipe', ['data' => $personnel]);
    }

    public function deleteEquipe($id)
    {
        $equipe = Equipe::where('id_personnel', $id)->firstOrFail();
        $equipe->delete();

        return redirect()->route('listeEquipes')->with('success', 'Équipe supprimée avec succès!');
    }

    public function updateEquipe(Request $request, $id)
    {
        $validated = $request->validate([
            'id_personnel' => 'required|exists:personnels,id',
        ]);

        $equipe = Equipe::find($id);

        if (!$equipe) {
            abort(404); // Handle case where equipe is not found
        }

        $equipe->id_personnel = $validated['id_personnel'];
        $equipe->save();

        return redirect()->route('listeEquipes')->with('success', 'Équipe modifiée avec succès!');
    }

    public function ajouterEquipe()
    {
        $equipes = Equipe::all()->pluck('id_personnel');
        $personnels = Personnels::whereNotIn('id', $equipes)->get();

        return view('Administrateur.equipe.ajouterEquipe', ['data' => $personnels]);
    }
}
