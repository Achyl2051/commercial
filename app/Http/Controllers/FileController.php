<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function getfile($folder, $filename)
{
    $path = storage_path("app/$folder/$filename");

    if (file_exists($path)) {
        return response()->file($path);
    } else {
        abort(404); // Ou renvoyez une erreur 404 si le fichier n'existe pas.
    }
}
}
