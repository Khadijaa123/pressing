<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TransporteurController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\EquipeController;


Route::get('/', function () {
    return view('welcome');
});



//////////////////////////////////////////////////////////////////////////////

Route::get('/Supplement', function () {
    return view('Administrateur/supplement');
})->name('Supplement');


Route::get('/admin', function () {
    return view('Administrateur/index');
})->name('login');



Route::get('/home', function () {
    return view('Administrateur/dashboard');
})->name('home');

Route::post(
    '/submit-form',
    [AdminController::class, 'submit']
)->name('form.submit');


// ------------------------------------------------------------------------------------------------------------------->
// verified that i need 
// client
Route::get('/client', [ClientController::class, 'index'])->name('listeClient');
Route::post('/client', [ClientController::class, 'store'])->name('client.store');
Route::post('/client1', [ClientController::class, 'store1'])->name('client.store1');
Route::post('/clientU', [ClientController::class, 'updateClient'])->name('client.update');
Route::get('/listeClient', [ClientController::class, 'getClient'])->name('listeClient');
Route::get('/modifierClient/{id}', [ClientController::class, 'getClientId'])->name('modifierClient');
Route::get('/supprimerClient/{id}', [ClientController::class, 'deleteClient'])->name('supprimerClient');
Route::get('/ajouterClient', function () {
    return view('Administrateur/client/client');
})->name('ajouterClient');

// personnel
Route::get('/personnel', [PersonnelsController::class, 'index'])->name('listePersonnel');
Route::post('/personnel', [PersonnelsController::class, 'store'])->name('personnel.store');
Route::post('/personnelU/{id}', [PersonnelsController::class, 'updatePersonnel'])->name('personnel.update');
Route::get('/listePersonnels', [PersonnelsController::class, 'listePersonnel'])->name('listePersonnels');
Route::get('/modifierPersonnel/{id}', [PersonnelsController::class, 'getPersonnelId'])->name('modifierPersonnel');
Route::get('/supprimerPersonnel/{id}', [PersonnelsController::class, 'deletePersonnel'])->name('supprimerPersonnel');
Route::get('/ajouterPersonnel', function () {
    return view('Administrateur/personnels/ajouterPersonnel');
})->name('ajouterPersonnel');

// transporteur
Route::get('/transporteur', [TransporteurController::class, 'getTransporteurs'])->name('listeTransporteurs');
Route::get('/ajouterTransporteur', [TransporteurController::class, 'ajouterTransporteur'])->name('ajouterTransporteur');
Route::post('/transporteur', [TransporteurController::class, 'store'])->name('transporteur.store');
Route::get('/modifierTransporteur/{id}', [TransporteurController::class, 'getTransporteurId'])->name('modifierTransporteur');
Route::post('/transporteurU', [TransporteurController::class, 'updateTransporteur'])->name('transporteur.update');
Route::get('/supprimerTransporteur/{id}', [TransporteurController::class, 'deleteTransporteur'])->name('supprimerTransporteur');

// eqipe
Route::get('/equipe', [EquipeController::class, 'getEquipes'])->name('listeEquipes');
Route::get('/ajouterEquipe', [EquipeController::class, 'ajouterEquipe'])->name('ajouterEquipe');
Route::post('/equipe', [EquipeController::class, 'store'])->name('equipe.store');
Route::get('/modifierEquipe/{id}', [EquipeController::class, 'getEquipeId'])->name('modifierEquipe');
Route::post('/equipeU', [EquipeController::class, 'updateEquipe'])->name('equipe.update');
Route::get('/supprimerEquipe/{id}', [EquipeController::class, 'deleteEquipe'])->name('supprimerEquipe');


////////////////////
Route::get('/ajouterCategorie', [CategorieController::class, 'create'])->name('ajouterCategorie');
Route::get('/listeCategorie', [CategorieController::class, 'getCategories'])->name('listeCategorie');
Route::post('/categories', [CategorieController::class, 'store'])->name('categorie.store');
Route::get('/modifierCategorie/{id}', [CategorieController::class, 'getCategorieById'])->name('modifierCategorie');
Route::get('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');
Route::put('/categorieU/{id}', [CategorieController::class, 'update'])->name('categorie.update');



use App\Http\Controllers\SousCategorieController;

Route::get('/listeSousCategories', [SousCategorieController::class, 'getSousCategories'])->name('listeSousCategories');
Route::get('/ajouterSousCategorie', [SousCategorieController::class, 'create'])->name('ajouterSousCategorie');
Route::post('/sousCategories', [SousCategorieController::class, 'store'])->name('sousCategorie.store');
Route::get('/modifierSousCategorie/{id}', [SousCategorieController::class, 'edit'])->name('sousCategorie.edit');
Route::put('/sousCategories/{id}', [SousCategorieController::class, 'update'])->name('sousCategorie.update');
Route::delete('/sousCategories/{id}', [SousCategorieController::class, 'destroy'])->name('sousCategorie.destroy');


use App\Http\Controllers\ServiceController;
Route::get('/listeService', [ServiceController::class, 'getService'])->name('listeService');
Route::get('/service', [ServiceController::class, 'index'])->name('services.index');
Route::get('/service/create', [ServiceController::class, 'create'])->name('servicescreate');
Route::post('/service', [ServiceController::class, 'store'])->name('services.store');

Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/service/{id}', [ServiceController::class, 'update'])->name('services.update');


/////////////////////////////////////////////////
Route::get('/', function () {
    return view('client/index');
})->name('indexclient');
Route::post('/loginclient', [ClientController::class, 'login'])->name('loginclient');

Route::get('/log1', function () {
    return view('Administrateur/index1');})-> name('cree');

Route::get('/about', function () {
    return view('client/about');
});

Route::get('/blog', function () {
    return view('client/blog');
});

Route::get('/blog-1', function () {
    return view('client/blog-1');
});

Route::get('/blog-2', function () {
    return view('client/blog-2');
});

Route::get('/contact', function () {
    return view('client/contact');
});

Route::get('/faq', function () {
    return view('client/faq');
});

Route::get('/pricing', function () {
    return view('client/pricing');
});

Route::get('/services', [CategorieController::class, 'getCategories1'])->name('listeCategorie1');
Route::get('/services1/{id}', [SousCategorieController::class, 'getCategories1'])->name('listeCategorie11');
Route::get('/services1eeee1/{id}', [ServiceController::class,'getCategories11'])->name('servicecat');
//////////////////
use App\Http\Controllers\CommandeController;

Route::get('/administrateur/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');
Route::post('/administrateur/commandes/store', [CommandeController::class, 'store'])->name('commandes.store');
Route::get('/administrateur/commandesssssssss', [CommandeController::class, 'getCommandes'])->name('listeCommandes');
Route::get('/administrateur/commandes/{id}', [CommandeController::class, 'getCommandeById'])->name('commandes.edit');
Route::put('/administrateur/commandes/update', [CommandeController::class, 'updateCommande'])->name('commandes.update');
Route::delete('/administrateur/commandes/{id}', [CommandeController::class, 'deleteCommande'])->name('commandes.delete');



Route::get('/historique', [CommandeController::class, 'getHistorique'])->name('historique');


use App\Http\Controllers\lignepanierController;
Route::post('/panier/add', [lignepanierController::class, 'add'])->name('panier.add');
Route::get('/panier', [lignepanierController::class, 'index'])->name('panier.index');
Route::post('/commande/valider', [lignepanierController::class, 'valider'])->name('commande.valider');
