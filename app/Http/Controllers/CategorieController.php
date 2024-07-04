<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Create a new Categorie with the validated data
        $categorie = new Categorie();
        $categorie->nom = $validated['nom'];
        $categorie->description = $validated['description'];
    
        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/services'), $imageName);
            $categorie->photo = $imageName;
        }
    
        // Save the Categorie
        $categorie->save();
    
        return redirect()->route('listeCategorie')->with('success', 'Catégorie créée avec succès!');
    }
    

    public function create()
    {
        // Return the view to create a new category
        return view('Administrateur/categorie/Categorie');
    }

    public function getCategories()
    {
        $categories = Categorie::all();
        return view('Administrateur/categorie/listeCategorie', ['data' => $categories]);
    }
    public function getCategories1()
    {
        $categories = Categorie::all();
        return view('client/services', ['data' => $categories]);
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('listeCategorie')->with('message', 'Catégorie supprimée avec succès');
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);
    
        // Find the category by its ID
        $categorie = Categorie::findOrFail($id);
    
        // Update the category with the validated data
        $categorie->nom = $validated['nom'];
        $categorie->description = $validated['description'];
    
        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/services'), $imageName);
            $categorie->photo = $imageName; // Ensure you are assigning to $categorie, not $sousCategorie
        }
    
        // Save the category
        $categorie->save();
    
        return redirect()->route('listeCategorie')->with('success', 'Catégorie modifiée avec succès!');
    }
    

    
    

public function index(Request $request)
    {
        return redirect()->route('listeCategorie')->with('success', 'Formulaire soumis avec succès!');
    }

    public function indexCategorie(Request $request)
    {
        return redirect()->route('listeCategorie');
    }

    
    public function getCategorieById($id){
            $categorie = Categorie::find($id);
            return view('Administrateur/categorie/modifierCategorie', ['data'=>$categorie]);
        }
}
