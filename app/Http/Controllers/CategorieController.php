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
        ]);

        // Create a new category with the validated data
        $categorie = new Categorie();
        $categorie->nom = $validated['nom'];
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

    public function updateCategorie(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'id' => 'required|integer|exists:categories,id',
        'nom' => 'required|string|max:255',
    ]);

    // Find the category by its ID
    $categorie = Categorie::findOrFail($validated['id']);

    // Update the category with the validated data
    $categorie->nom = $validated['nom'];
    $categorie->save();

    return redirect()->route('listeCategorie')->with('message', 'Catégorie modifiée avec succès');
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
