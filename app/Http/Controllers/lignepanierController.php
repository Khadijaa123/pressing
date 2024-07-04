<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ligne_panier;
use App\Models\Service;

class lignepanierController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
        ]);

      
        $quantity = $request->input('quantity');
        
        // Logic to add the service to the cart
        $service = Service::find($request->input('service_id'));

        // Assuming you have a Panier model and a way to identify the user/session
        $panier = new ligne_panier();
        $panier->id_service= $service->id;
        $panier->quantite = $quantity;
        // Add other necessary fields such as user_id, etc.
        $panier->save();

        return redirect()->back()->with('success', 'Service ajouté au panier avec succès!');
    }
    public function index(){
        $client = ligne_panier::all();
        return view('client/panier',['data'=>$client]);
    }
}
