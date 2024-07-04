<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientController
{
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

    public function updateClient(Request $request){
        $client = Client::find($request->id);
        $client->nom  = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->adresseE;
        $client->num_tel = $request->telephone;
        $client->ville = $request->ville;
        // $client->passwd = $request->password  ;
        $client->update();
        return redirect()->route('listeClient')->with('message', 'Client a ete bien modifié');
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
