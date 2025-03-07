<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $employes = Employe::when($search, function ($query, $search) {
            return $query->where('nom', 'LIKE', "%{$search}%")
                         ->orWhere('prenom', 'LIKE', "%{$search}%")
                         ->orWhere('email', 'LIKE', "%{$search}%")
                         ->orWhere('telephone', 'LIKE', "%{$search}%")
                         ->orWhere('poste', 'LIKE', "%{$search}%");
        })->get(); // Afficher 10 employés par page

        return view('employes.index', compact('employes'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employes.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'email' => 'required|email|unique:employes,email',
            'date_embauche' => 'required|date',
        ]);

        Employe::create($request->all());

        return redirect()->route('employes.index')->with('success', 'Employé ajouté avec succès.');
    }




    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        return view('employes.show', compact('employe'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        return view('employes.edit', compact('employe'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'poste' => 'required|string|max:255',
            'date_embauche' => 'required|date',
        ], [
            'date_embauche.required' => 'Veuillez renseigner la date d\'embauche.',
            'date_embauche.date' => 'Le format de la date d\'embauche est invalide.',
        ]);


        // Récupération de l'employé
        $employe = Employe::findOrFail($id);

        // Mise à jour des champs
        $employe->nom = $request->nom;
        $employe->email = $request->email;
        $employe->telephone = $request->telephone;
        $employe->poste = $request->poste;
        $employe->date_embauche = $request->date_embauche;

        // Sauvegarde des modifications
        $employe->save();

        // Redirection avec message de succès
        return redirect()->route('employes.index')->with('success', 'Employé modifié avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return redirect()->route('employes.index')->with('success', 'Employé supprimé');
    }

}
