<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateFormRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function exemple($username)
    {
        return 'hello ' . $username;
    }

    public function accueil()
    {
        $name = 'faly';
        return view('accueil', [
            'name' => $name
        ]);
    }

    public function store(ValidateFormRequest $request)
    {

        $verif = $request;

        if ($verif) {
            echo "loged";
        } else {
            return redirect()->back();
        }
    }
}

?>