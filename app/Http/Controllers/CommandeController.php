<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commande;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validated = $request->validate([
            'date' => 'required|date',
            'heure' => 'required',
            'prix' => 'required|numeric',
            'date_ramassage' => 'required|date',
            'num_tel' => 'required|string',
            'type' => 'required|string',
            'remarque' => 'nullable|string',
            'id_client' => 'required|integer|exists:clients,id',
            'id_transporteur' => 'required|integer|exists:transporteurs,id',
            'id_panier' => 'required|integer|exists:paniers,id',
        ]);

        // Créer une nouvelle commande avec les données validées
        $commande = commande::create($validated);

        return redirect()->route('listeCommandes')->with('success', 'Commande créée avec succès!');
    }

    public function create()
    {
        // Retourner la vue pour créer une nouvelle commande
        return view('Administrateur.commande.create');
    }

    public function getCommandes()
    {
        $commandes = Commande::all();
        return view('Administrateur/commande/listeCommandes', ['data' => $commandes]);
    }
    public function getHistorique()
    {
        $commandes = Commande::all();
        return view('Administrateur/commande/historique', ['data' => $commandes]);
    }

    public function deleteCommande($id)
    {
        $commande = Commande::find($id);
        $commande->delete();

        return redirect()->route('listeCommandes')->with('message', 'Commande supprimée avec succès');
    }

    public function updateCommande(Request $request)
    {
        // Valider les données de la requête
        $validated = $request->validate([
            'id' => 'required|integer|exists:commande,id',
            'date' => 'required|date',
            'heure' => 'required',
            'prix' => 'required|numeric',
            'date_ramassage' => 'required|date',
            'num_tel' => 'required|string',
            'type' => 'required|string',
            'remarque' => 'nullable|string',
            'id_client' => 'required|integer|exists:clients,id',
            'id_transporteur' => 'required|integer|exists:transporteurs,id',
            'id_panier' => 'required|integer|exists:paniers,id',
        ]);

        // Trouver et mettre à jour la commande avec les données validées
        $commande = Commande::find($validated['id']);
        $commande->fill($validated);
        $commande->save();

        return redirect()->route('listeCommandes')->with('message', 'Commande modifiée avec succès');
    }

    public function index(Request $request)
    {
        return redirect()->route('listeCommandes')->with('success', 'Formulaire soumis avec succès!');
    }

    public function indexCommande(Request $request)
    {
        return redirect()->route('listeCommandes');
    }

    public function getCommandeById($id)
    {
        $commande = Commande::find($id);
        return view('Administrateur.commande.modifierCommande', ['data' => $commande]);
    }
}
