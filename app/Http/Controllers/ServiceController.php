<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\SousCategorie;

class ServiceController extends Controller
{    public function getCategories11($id)
    {
        // Fetch the category based on ID
        $category = SousCategorie::findOrFail($id);

        // Fetch related sub-categories if needed
        $sousCategories = Service::where('id_sous_categories', $id)->get();

        // Pass data to the view
        return view('client/servicecat', ['data' => $sousCategories]);
    }
    public function index()
    {
        $services = Service::with('sousCategorie')->get();
        return view('listeService', compact('services'));
    }

    public function create()
    {
        $sousCategories = SousCategorie::all();
        return view('Administrateur/service/create', compact('sousCategories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
            'description' => 'required',
            'id_sous_categories' => 'required',
        ]);

        // Enregistrement de l'image dans le dossier public/images/services
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('images/services'), $imageName);

        // Création du service dans la base de données
        $service = new service();
        $service->nom = $request->nom;
        $service->prix = $request->prix;
        $service->photo = $imageName; // Stocker le nom de l'image dans la base de données
        $service->description = $request->description;
        $service->id_sous_categories = $request->id_sous_categories;
        $service->save();

        return redirect()->route('listeService')->with('success', 'Service ajouté avec succès.');
    }
   
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $sousCategories = SousCategorie::all();
        return view('Administrateur/service/modifierService', compact('service', 'sousCategories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
            'id_sous_categories' => 'required|integer|exists:sous_categories,id',
        ]);
    
        $service = Service::findOrFail($id);
    
        // Mettre à jour les champs du service
        $service->prix = $validated['prix'];
        $service->nom  = $validated['nom'];
        $service->description = $validated['description'];
        $service->id_sous_categories = $validated['id_sous_categories'];
    
        // Vérifier s'il y a une nouvelle image à mettre à jour
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/services'), $imageName);
            $service->photo = $imageName;
        }
    
        $service->save();
    
        return redirect()->route('listeService')->with('success', 'Service modifié avec succès!');
    }
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('listeService')->with('success', 'Service supprimé avec succès!');
    }
    public function getService(Request $request)
    {
        $searchTerm = $request->input('query');
    
        if ($searchTerm) {
            $services = Service::with('sousCategorie')
                                ->where('nom', 'LIKE', "%{$searchTerm}%")
                               
                                ->get();
        } else {
            $services = Service::with('sousCategorie')->get();
        }
    
        if ($request->ajax()) {
            return response()->json(['data' => $services]);
        }
    
        return view('Administrateur/service/listeService', ['data' => $services, 'searchTerm' => $searchTerm]);
    }
    
}
