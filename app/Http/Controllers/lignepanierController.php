<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ligne_panier;
use App\Models\Service;
use App\Models\panier;
use Carbon\Carbon;
use App\Models\commande;

class lignepanierController extends Controller
{public function valider(Request $request)
    {
        $categories = Service::all();
    
        // Créer un nouveau panier
        $panier = panier::create([
            'date_panier' => Carbon::now()->toDateString(),
            'heure_panier' => Carbon::now()->toTimeString()
        ]);
    
        $totalSum = 0;
    
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            foreach ($cart as $item) {
                foreach ($categories as $itemm) {
                    if ($item['service_id'] == $itemm['id']) {
                        $totalSum += $item['quantity'] * $itemm['prix'];
                    }
                }
            }
    
            // Calcul des frais de livraison
            $fraisLivraison = 0;
            $adresseLivraison = $request->input('adresse_livraison');
            if ($adresseLivraison !== 'Gabes Ville' && $adresseLivraison !== 'Gabes Nord' && $adresseLivraison !== 'Gabes Sud') {
                $fraisLivraison = 10;
            }
    
            $totalWithDelivery = $totalSum + $fraisLivraison;
    
            // Créer les entrées de ligne_panier
            foreach ($cart as $item) {
                ligne_panier::create([
                    'quantite' => $item['quantity'],
                    'id_service' => $item['service_id'],
                    'id_panier' => $panier->id
                ]);
            }
    
            // Créer la commande
            $commande = Commande::create([
                'date' => Carbon::now()->toDateString(),
                'heure' => Carbon::now()->toTimeString(),
                'prix' => $totalWithDelivery,
                'type' => '1',
                'id_panier' => $panier->id,
                'remarque' => $request->input('remarque'),
                'num_tel' => $request->input('num_tel'),
                'adresse_livraison' => $adresseLivraison,
                'date_ramassage' => $request->input('date_ramassage'),
                'specification_adresse' => $request->input('specification_adresse')
            ]);
    
            // Effacer le panier de la session
            session()->forget('cart');
        }
    
        // Récupérer les données pour la vue
        $categories = panier::all();
        $sousCategories = ligne_panier::all();
        $commandes = Commande::all();
        $serv = Service::all();
    
        return view('client/historique', [
            'data' => $commandes,
            'ligne_panier' => $sousCategories,
            'panier' => $categories,
            'service' => $serv
        ]);
    }
    
    public function add(Request $request)
    {
        $service = [
            'service_id' => $request->input('service_id'),
            'quantity' => $request->input('quantity'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),

         
        ];

        // Store the service in the session
        session()->put('cart.service_' . $service['service_id'], $service);

        return redirect()->back()->with('success', 'Service added to cart!');
    }

    public function index()
    { $categories = Service::all();
        // Retrieve the cart from the session 
        $cart = session()->get('cart', []);
  // Assuming you are using sessions for the cart
    // Get all categories
    $totalSum = 0;
    foreach ($cart as $item) {
        foreach ($categories as $category) {
            if ($item['service_id'] == $category['id']) {
                $totalSum += $item['quantity'] * $category['prix'];
            }
        }
    }

    return view('client.panier', compact('cart', 'categories', 'totalSum'));

    }
    public function getpanier($id_panier)
    {
        $categories = Service::all();
        // Fetch related sub-categories if needed
        $sousCategories =ligne_panier::where('id_panier', $id_panier)->get();

        // Pass data to the view
        return view('Administrateur/panier/panier', ['data' => $sousCategories,'dataa'=>$categories]);
    }
   
    
}
