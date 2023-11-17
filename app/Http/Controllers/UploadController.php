<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Valider le formulaire
        $request->validate([
            'file' => 'required|file|max:2048', // Taille maximale de 2 Mo
        ]);

        // Enregistrer le fichier dans le dossier de stockage
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('uploads', $fileName);

        // Vous pouvez également enregistrer d'autres informations dans la base de données si nécessaire

        return redirect()->back()->with('success', 'Fichier téléchargé avec succès.');
    }
}
