<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commande;
use App\Models\Transporteur;
use App\Models\Personnels;
use Carbon\Carbon;

use App\Models\ligne_panier;
use App\Models\Service;
use App\Models\panier;

use Illuminate\Support\Facades\DB;
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
        $transporteurs = Transporteur::all();
        $personnelsIds = Personnels::all();
        $mostOrderedService = $this->getMostOrderedService();
    
        return view('Administrateur/commande/listeCommandes', [
            'data' => $commandes,
            'transporteurs' => $transporteurs,
            'pers' => $personnelsIds,
            'mostOrderedService'=> $mostOrderedService 
        ]);
    }
    
    public function getHistorique()
    {
        $commandes = Commande::all();
        $transporteurs = Transporteur::all();
        $personnelsIds = Personnels::all();
       
    
        return view('Administrateur/commande/historique', [
            'data' => $commandes,
            'transporteurs' => $transporteurs,
            'pers' => $personnelsIds,
            
        ]);
    }
    public function getHistorique1()
    {      $categories = panier::all();
        // Fetch related sub-categories if needed
        $sousCategories =ligne_panier::all();
        $commandes = Commande::all();
        $serv= Service::all();
        return view('client/historique', ['data' => $commandes,'ligne_panier' => $sousCategories,'panier'=>$categories,'service'=>$serv]);
    }
    public function getMostOrderedService()
    {
        $mostOrderedService = DB::table('services')
                                ->join('ligne_panier', 'services.id', '=', 'ligne_panier.id_service')
                                ->select('services.nom', DB::raw('count(ligne_panier.id_service) as total_orders'))
                                ->groupBy('services.nom')
                                ->orderBy('total_orders', 'desc')
                                ->get();
    
        return $mostOrderedService;
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
    public function assignTransporteur(Request $request)
    {
       
     
        $commande = commande::find($request->commande_id);
        $commande->id_transporteur = $request->id_transporteur;
        $commande->type='2'; // Use the correct field name
        $commande->save();
    
        return redirect()->back()->with('success', 'Transporteur assigné avec succès!');
    }
    public function assignType(Request $request)
    {
        $request->validate([
            'commande_id' => 'required|exists:commande,id',
            'types' => 'required|array', // Ensure it's an array
            'types.*' => 'in:1,2,3,4', // Validate each type value
        ]);
    
        $commande = Commande::find($request->commande_id);
        $commande->type = implode(',', $request->types);
        if ($commande->type == 4) {
        $commande->date_ramassage= Carbon::now()->toDateString(); 
        }// Save types as comma-separated string or as needed
        $commande->save();
    
        return redirect()->back()->with('success', 'Types assignés avec succès!');
    }

}
