<?php

namespace App\Http\Controllers;

use App\Models\NiveauScolaire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NiveauScolaireController extends Controller
{
    public function index(){
        $niveauScolaires = NiveauScolaire::orderBy("id")->paginate(6);
        return inertia("NiveauScolaire/IndexNiveauScolaire", compact('niveauScolaires'));
    }

    public function edit(NiveauScolaire $niveauScolaire){
        return response()->json(["niveauScolaire" => $niveauScolaire]);
    }

    public function store(Request $request){
        $request->validate([
            "nom" => "required|unique:App\\Models\NiveauScolaire"
        ]);

        NiveauScolaire::create(["nom"=> $request->nom]);

        return redirect()->back();
    }

    public function update(Request $request, NiveauScolaire $niveauScolaire){
        $uniqueEntity = NiveauScolaire::class;
        $request->validate([
            'nom'=>[
                'required',
              Rule::unique((new NiveauScolaire)->getTable(), 'nom')->ignore($niveauScolaire->id)
            ]
        ]);
        if ($request->nom != $niveauScolaire->nom){
            $niveauScolaire->nom = $request->nom;
            $niveauScolaire->save();
        }

        return redirect()->back();
    }

    public function delete (NiveauScolaire $niveauScolaire){
        if (count($niveauScolaire->etudiants)>0){
            return redirect()->back()->withErrors([
                'message'=>'Oups 👿  Vous ne pouvez pas supprimer un niveau scolaire qui contient déjà des élèves !'
            ]);
        }
        $niveauScolaire->delete();
        return redirect()->back();
    }
}
