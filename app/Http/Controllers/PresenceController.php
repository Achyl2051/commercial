<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Presence;

class PresenceController extends Controller
{
    
    public function nouveau()
    {
        $employes =  Employe::all();
        return view('presence.nouveau', [
            'employes' => $employes
        ]);
    }
    
    public function presence(Request $request){
        Presence::create([
                'idEmploye' => $request->idEmploye,
                'dateEntree' => $request->dateEntree,
                'dateSortie' => $request->dateSortie
        ]);
        return redirect()->back()->with('success', 'bienvenu');
    }

    public function choix()
    {
        $employes =  Employe::all();
        return view('presence.choix', [
            'employes' => $employes
        ]);
    }

    public function liste(Request $request)
    {
        $presence = Presence::with('employe')->where('idEmploye', $request->idEmploye)->get();
        return view('presence.liste', [
            'presences' => $presence
        ]);
    }

}
