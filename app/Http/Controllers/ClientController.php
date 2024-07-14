<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientController
{public function profile()
    {
        $client = Client::find(26); // Fetch the client with ID 1
        return view('client/faq', compact('client'));
    }
    
    //
    public function store(Request $request)
    {
        // Création d'un nouvel client avec les données validées
        $client = new Client();

        $client->nom  = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->adresseE;
        $client->num_tel = $request->telephone;
        $client->ville = $request->ville;
        $client->username = $request->username;
        $client->pwd = Hash::make($request->pwd);
        // $client->passwd = $request->password  ;
        $client->save();
        return redirect()->route('listeClient')->with('success', 'Formulaire soumis avec succès!');
    }
    public function store1(Request $request)
    {
        // Création d'un nouvel client avec les données validées
        $client = new Client();

        $client->nom  = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->adresseE;
        $client->num_tel = $request->telephone;
        $client->ville = $request->ville;
        $client->username = $request->username;
        $client->pwd = $request->pwd;
        // $client->passwd = $request->password  ;
        $client->save();
        return redirect()->route('login')->with('success', 'Formulaire soumis avec succès!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'pwd' => 'required|string',
        ]);

        $client = Client::where('username', $request->username)->where('pwd', $request->pwd)->first();

        if ($client) {
            // Login successful, redirect to the indexclient route
            return redirect()->route('indexclient');
        } else {
            // Login failed, redirect back with an error message
            return redirect()->back()->withErrors(['Invalid credentials. Please try again.']);
        }
    }

    public function getClient(){
        $client = Client::all();
        return view('Administrateur/client/listeClient',['data'=>$client]);
    }


    public function deleteClient($id){
        $client = Client::find($id);
        $client->delete();
         return redirect()->route('listeClient')->with('message', 'Client a ete bien supprimé');
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'num_tel' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
        ]);
    
        // Retrieve the client by ID
        $client = Client::find($id);
    
        // Check if the client exists
        if (!$client) {
            return redirect()->back()->with('error', 'Client non trouvé');
        }
    
        // Update the client's information
        $client->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'num_tel' => $request->num_tel,
            'ville' => $request->ville,
        ]);
    
        // Redirect with a success message
        return redirect()->route('client.profile')->with('success', 'Informations du client mises à jour avec succès');
    }
    
    public function update1(Request $request, $id)
{
    // Validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'num_tel' => 'required|string|max:20',
        'ville' => 'required|string|max:255',
    ]);

    // Récupérer le client
    $client = Client::find($id);

    // Vérifier si le client existe
    if (!$client) {
        return redirect()->back()->with('error', 'Client non trouvé');
    }

    // Mettre à jour les informations du client
    $client->update1([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'num_tel' => $request->num_tel,
        'ville' => $request->ville,
    ]);

    // Rediriger avec un message de succès
    return redirect()->route('client.profile')->with('success', 'Informations du client mises à jour avec succès');
}

    public function index(Request $request)
    {
        return redirect()->route('listeClient')->with('success', 'Formulaire soumis avec succès!');
    }

    public function indexClient(Request $request)
    {
        return redirect()->route('listeClient');
    }

    public function getClientId($id){
        $client = Client::find($id);
        return view('Administrateur/client/modifierClient', ['data'=>$client]);
    }
    
}
