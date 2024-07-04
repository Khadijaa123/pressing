<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousCategorie;
use App\Models\Categorie;

class SousCategorieController extends Controller
{
    public function index()
    {
        $sousCategories = SousCategorie::with('categorie')->get();
        return view('Administrateur.s', compact('sousCategories'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('Administrateur.souscategorie.create', compact('categories'));
    }
    public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'categorie_id' => 'required|integer|exists:categories,id',
    ]);

    // Create a new sous categorie with the validated data
    $sousCategorie = new SousCategorie();
    $sousCategorie->nom = $validated['nom'];
    $sousCategorie->id_categorie = $validated['categorie_id']; // Corrected to use 'categorie_id'
    $sousCategorie->save();

    return redirect()->route('listeSousCategories')->with('success', 'Sous-catégorie créée avec succès!');
}
public function edit($id)
{
    $sousCategorie = SousCategorie::findOrFail($id);
    $categories = Categorie::all();

    return view('Administrateur.souscategorie.modifierSous', compact('sousCategorie', 'categories'));
}

public function update(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'id_categories' => 'required|exists:categories,id',
        ]);

        $sousCategorie = SousCategorie::findOrFail($id);
        $sousCategorie->nom = $validated['nom'];
        $sousCategorie->id_categorie = $validated['id_categories'];
        $sousCategorie->save();

        return redirect()->route('listeSousCategories')->with('success', 'Sous-catégorie modifiée avec succès!');
    } catch (ModelNotFoundException $e) {
        return redirect()->route('listeSousCategories')->with('error', 'La sous-catégorie avec l\'ID spécifié n\'existe pas.');
    } catch (\Exception $e) {
        return redirect()->route('listeSousCategories')->with('error', 'Une erreur est survenue lors de la modification de la sous-catégorie.');
    }
}
public function getSousCategories()

    {$sous =Categorie::all();
        $categories = SousCategorie::all();
        return view('Administrateur/souscategorie/listeSousCategorie', ['data' => $categories , 'dataa'=>$sous]);
    }
    public function destroy($id)
    {
        $sousCategorie = SousCategorie::findOrFail($id);
        $sousCategorie->delete();

        return redirect()->route('listeSousCategories')->with('success', 'Sous-catégorie supprimée avec succès!');
    }
   
    public function getCategories1($id)
    {
        // Fetch the category based on ID
        $category = Categorie::findOrFail($id);

        // Fetch related sub-categories if needed
        $sousCategories = SousCategorie::where('id_categorie', $id)->get();

        // Pass data to the view
        return view('client/souscat', ['data' => $sousCategories]);
    }
}
