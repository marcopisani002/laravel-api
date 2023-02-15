<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Controllo se l'utente è admin.
        // se no blocco.


        if (Auth::user()) {
            return true; // blocca l'azione e da un errore di autorizzazione
        } else {
            return false;
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|min:10|max:255",
            "description" => "required|string",
            "cover_img" => "string|url",
            // exists controlla sulla tabella technologies,
            // che nella colonna id ci sia qualcuno con l'id ricevuto
            //  tramite il valore di technology_id
           
            "techonologies" => "nullable|array|exists:techonologies,id"
        ];
    }
}
