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
    {  $categories = Service::all();
        // Check if cart exists in the session
        $panier = panier::create([
            'date_panier' => Carbon::now()->toDateString(),
            'heure_panier' => Carbon::now()->toTimeString()
        ]);
        
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $totalPrice = 0;
            foreach ($cart as $item) {
                foreach($categories as $itemm){
                    if ($item['service_id'] == $itemm['id'])
                $totalPrice += $item['quantity'] * $itemm['prix']; // Assuming $item['service'] contains the related Service model
            }}
         
            // Assuming you have a way to identify the user, e.g., Auth::id() or another method
            // Modify according to your authentication method

            // Iterate over the cart items and create ligne_panier entries
            foreach ($cart as $item) {
                ligne_panier::create([
                    'quantite' => $item['quantity'],
                    'id_service' => $item['service_id'],
                    'id_panier' => $panier->id 
                    // Assuming 'id_panier' refers to a user ID or an order ID
                ]);
            }   $commande = Commande::create([
                'date' => Carbon::now()->toDateString(),
                'heure' => Carbon::now()->toTimeString(),
                'prix' => $totalPrice,
                'type' => '1',
                'id_panier' => $panier->id,
                'remarque' => $request->input('remarque'),
                'num_tel' => $request->input('num_tel')
            ]);
        
            // Clear the cart from the session
            session()->forget('cart');
            
            return redirect()->back()->with('success', 'Commande validée avec succès!');
        }
        
        return redirect()->back()->with('error', 'Votre panier est vide.');
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
