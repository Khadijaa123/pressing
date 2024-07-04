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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
            'description' => 'required',
        ]);

        // Enregistrement de l'image dans le dossier public/images/services
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('images/services'), $imageName);

        // Create a new sous categorie with the validated data
        $sousCategorie = new SousCategorie();
        $sousCategorie->nom = $validated['nom'];
        $sousCategorie->photo = $imageName; // Stocker le nom de l'image dans la base de données
        $sousCategorie->description = $request->description;
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
    $sousCategorie = SousCategorie::findOrFail($id);

    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'id_categories' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $sousCategorie->nom = $validatedData['nom'];
    $sousCategorie->id_categorie = $validatedData['id_categories'];
    $sousCategorie->description = $validatedData['description'];

    if ($request->hasFile('photo')) {
        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images/services'), $imageName);
        $sousCategorie->photo = $imageName;
    }

    $sousCategorie->save();

    return redirect()->route('listeSousCategories')->with('success', 'Sous-catégorie mise à jour avec succès');
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
