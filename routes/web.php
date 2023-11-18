<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ficheDePaieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\BonCommandeController;
use App\Http\Controllers\DetailBonCommandeController;
use App\Http\Controllers\fournisseurController;
use App\Http\Controllers\produitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('guest')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/register', [UserController::class, 'register'])->name('registration');
    Route::post('/register', [UserController::class, 'handleRegistration'])->name('registration');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'handleLogin'])->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('rolesPermissions')->group(function () {
        Route::get('/newRole', [RoleController::class, 'newRole'])->name('role.new');
        Route::post('/createRole', [RoleController::class, 'create_role'])->name('role.create');
        Route::get('/listRoles', [RoleController::class, 'getUserRoles'])->name('role.list');
        
        Route::get('/attributPermissionToRole', [RoleController::class, 'attributPermissionToRole'])->name('role.attributPermissionToRole');
        Route::get('/attributRoleUser', [RoleController::class, 'attributRoleUser'])->name('role.attributRoleUser');
        
        
        Route::post('/createPermission', [RoleController::class, 'create_permission'])->name('permission.create');
        Route::post('/attachPermissionToRole', [RoleController::class, 'attach_permission_to_role'])->name('permission.givePermissionToRole');
        Route::post('/attributeRoleToUser', [RoleController::class, 'attribute_role_to_user'])->name('permission.attributeRoleToUser');
    });

    Route::prefix('offres')->group(function () {
        Route::get('/liste', [OffreController::class, 'liste'])->name('offres.liste');
        Route::get('/nouveau', [OffreController::class, 'nouveau'])->name('offres.nouveau');
        Route::post('/ajouter', [OffreController::class, 'ajouter'])->name('offres.ajouter');
        Route::get('/questionnaire/{offre}', [OffreController::class, 'questionnaire'])->name('offres.questionnaire');
        Route::get('/criteres/{offre}', [OffreController::class, 'criteres'])->name('offres.criteres');
        Route::post('/ajouter_question', [OffreController::class, 'ajouter_question'])->name('offres.ajouter_question');
        Route::post('/sqssajouter_reponse', [OffreController::class, 'ajouter_reponse'])->name('offres.ajouter_reponse');
        Route::post('/ajouter_typedomaine_cv', [OffreController::class, 'ajouter_typedomaine_cv'])->name('offres.ajouter_typedomaine_cv');
        Route::get('/{offre}/editer_offre', [OffreController::class, 'editer_offre'])->name('offres.editer_offre');
        Route::put('/{offre}/update_offre', [OffreController::class, 'update_offre'])->name('offres.update_offre');
    });

    Route::prefix('employes')->group(function() {
        Route::get('/liste',[EmployeController::class,'liste'])->name('employes.liste');
        Route::get('/nouveau',[EmployeController::class,'nouveau'])->name('employes.nouveau');
        Route::post('/recruter',[EmployeController::class,'recruter'])->name('employes.recruter');
        Route::get('/voir',[EmployeController::class,'voir'])->name('employes.voir');
    });

    Route::prefix('contrats')->group(function() {
        Route::get('/liste',[ContratController::class,'liste'])->name('contrats.liste');
        Route::get('/nouveau',[ContratController::class,'contrat'])->name('contrats.nouveau');
        Route::post('/signer',[ContratController::class,'signer'])->name('contrats.signer');
    });
    Route::prefix('conges')->group(function() {
        Route::get('/nouveau',[CongeController::class,'nouveau'])->name('conges.nouveau');
        Route::get('/notif',[CongeController::class,'notif'])->name('conges.notif');
        Route::get('/historique',[CongeController::class,'historique'])->name('conges.historique');
        Route::post('/liste',[CongeController::class,'liste'])->name('conges.liste');
        Route::post('/demander',[CongeController::class,'demander'])->name('conges.demander');
        Route::post('/valider',[CongeController::class,'valider'])->name('conges.valider');
    });
    
    Route::prefix('bonCommandes')->group(function() {
        Route::get('/nouveau',[BonCommandeController::class,'nouveau'])->name('bonCommandes.nouveau');
        Route::get('/notiffinance',[BonCommandeController::class,'notiffinance'])->name('bonCommandes.notiffinance');
        Route::get('/notifdaf',[BonCommandeController::class,'notifdaf'])->name('bonCommandes.notifdaf');
        Route::get('/liste',[BonCommandeController::class,'liste'])->name('bonCommandes.liste');
        Route::post('/details/{idBonCommande}',[BonCommandeController::class,'details'])->name('bonCommandes.details');
        Route::post('/insertion',[BonCommandeController::class,'insertion'])->name('bonCommandes.insertion');
        Route::post('/validerfinance',[BonCommandeController::class,'validerfinance'])->name('bonCommandes.validerfinance');
        Route::post('/validerdaf',[BonCommandeController::class,'validerdaf'])->name('bonCommandes.validerdaf');
    });

    Route::prefix('detailsBonCommandes')->group(function() {
        Route::get('/nouveau',[DetailBonCommandeController::class,'nouveau'])->name('detailsBonCommandes.nouveau');
        Route::post('/insertion',[DetailBonCommandeController::class,'insertion'])->name('detailsBonCommandes.insertion');
    });

    Route::get('storage/{folder}/{filename}',[FileController::class,'getfile'])->name('getfile');


    Route::prefix('paies')->group(function() {
        Route::get('/nouveau',[ficheDePaieController::class,'nouveau'])->name('paies.nouveau');
        Route::get('/choixPeriode',[ficheDePaieController::class,'choixPeriode'])->name('paies.choixPeriode');
        Route::get('/nouveauDetail/{idFichePaie}',[ficheDePaieController::class,'nouveauDetail'])->name('paies.nouveauDetail');
        Route::get('/liste',[ficheDePaieController::class,'liste'])->name('paies.liste');
        Route::get('/details/{idFichePaie}/{idEmploye}',[ficheDePaieController::class,'details'])->name('paies.details');
        Route::post('/inscrire',[ficheDePaieController::class,'inscrire'])->name('paies.inscrire');
        Route::post('/ajoutDetail',[ficheDePaieController::class,'ajoutDetail'])->name('paies.ajoutDetail');
        Route::post('/ficheAvecDetail',[ficheDePaieController::class,'ficheAvecDetail'])->name('paies.ficheAvecDetail');
    });
    Route::prefix('presence')->group(function() {
        Route::get('/nouveau',[PresenceController::class,'nouveau'])->name('presence.nouveau');
        Route::post('/presence',[PresenceController::class,'presence'])->name('presence.presence');
        Route::post('/liste',[PresenceController::class,'liste'])->name('presence.liste');
        Route::get('/choix',[PresenceController::class,'choix'])->name('presence.choix');
    });
    Route::prefix('fournisseur')->group(function() {
        Route::get('/nouveau',[fournisseurController::class,'nouveau'])->name('fournisseur.nouveau');
        Route::get('/liste',[fournisseurController::class,'liste'])->name('fournisseur.liste');
        Route::post('/inscrire',[fournisseurController::class,'inscrire'])->name('fournisseur.inscrire');
    });
    Route::prefix('produit')->group(function() {
        Route::get('/nouveau',[produitController::class,'nouveau'])->name('produit.nouveau');
        Route::get('/liste',[produitController::class,'liste'])->name('produit.liste');
        Route::get('/prixProduit/{idProduit}',[produitController::class,'prixProduit'])->name('produit.prixProduit');
        Route::post('/inscrire',[produitController::class,'inscrire'])->name('produit.inscrire');
        Route::post('/insererPrixProduit',[produitController::class,'insererPrixProduit'])->name('produit.insererPrixProduit');
    });
    
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', [UserController::class, 'dashboard'])->name('dashboard');
});
