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
        // Validate the request data
        $validated = $request->validate([
            'prix' => 'required|numeric',
            'photo' => 'nullable|string',
            'description' => 'required|string|max:255',
            'id_sous_categories' => 'required|integer|exists:sous_categories,id',
        ]);
    
        // Create a new service with the validated data
        $service = new Service();
        $service->prix = $validated['prix'];
        $service->photo = $validated['photo'];
        $service->description = $validated['description'];
        $service->id_sous_categories = $validated['id_sous_categories']; // Ensure correct field name
        $service->save();
    
        return redirect()->route('listeService')->with('success', 'Service créé avec succès!');
    }
    

    public function edit($id)
    {
        $service = Service::find($id);
        $sousCategories = SousCategorie::all();
        return view('/Administrateur/service/modifierService', compact('service', 'sousCategories'));
    }

    public function update(Request $request, $id)
        {
        // Validate the request data
        $validated = $request->validate([
            'prix' => 'required|numeric',
            'photo' => 'nullable|string',
            'description' => 'required|string|max:255',
            'id_sous_categories' => 'required|integer|exists:sous_categories,id',
        ]);

        $service = Service::findOrFail($id);
        $service->update($validated);

        return redirect()->route('listeService')->with('success', 'Service modifié avec succès!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('listeService')->with('success', 'Service supprimé avec succès!');
    }

    public function getService()
    {
        $categories = Service::all();
        return view('Administrateur/service/listeService', ['data' => $categories]);
    }
}
