<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\NiveauScolaire;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){

        $etudiants = Etudiant::latest()->paginate(5);
        //
        return inertia("Etudiant/index", compact('etudiants'));
    }

    public function create(){
        return inertia("Etudiant/Create");
    }

    public function edit($id){
        return inertia("Etudiant/Edit");
    }
}
