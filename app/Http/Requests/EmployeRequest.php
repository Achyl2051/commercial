<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' =>'required|min:2',
            'prenom' =>'required|min:1',
            'genre' => 'required',
            'adresse' =>'required',
            'telephone' =>'required',
            'email' =>'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'dateNaissance' =>'required|date',
            'dateEmbauche' =>'required|date',
            'idDirection' =>'required',
            'idFonction' =>'required',
            'idTypeContrat' =>'required',
            'idStatutMarital' =>'required',     
        ];
        
    }

    public function messages(){
        return [
            'nom.required' => 'nom requis',
            'nom.min' => 'valeur minimum de nom de l\'offre : 3 caracteres',
            'nom.letters' => 'ne doit pas contenir des chiffres',
            'prenom.required' => 'nom requis',
            'prenom.min' => 'valeur minimum de nom de l\'offre : 3 caracteres',
            'prenom.letters' => 'ne doit pas contenir des chiffres',
            'genre.required' => 'genre requis',
            'adresse.required' => 'adresse requis',
            'telephone.required' => 'telephone requis',
            'email.required' => 'email requis',
            'file.image' => 'doit etre une image',
            'file.mimes' => 'extension invalide',
            'file.max' => 'image trop volumineux , < 2Mo requis',
            'dateNaissance.required' =>'date de naissance requis',
            'dateNaissance.date' =>'date non valide',
            'dateEmbauche.required' =>'date d\'embauche requis',
            'dateEmbauche.date' =>'date non valide',
            'idDirection.required' =>'Direction requis',
            'idFonction.required' =>'Fonction requis',
            'idTypeContrat.required' =>'TypeContrat requis',
            'idStatutMarital.required' =>'Statut Marital requis',  
        ];
    }
}
