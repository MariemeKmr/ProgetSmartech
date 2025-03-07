<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $clients = Client::when($search, function ($query, $search) {
            return $query->where('nom', 'like', "%{$search}%")
                         ->orWhere('secteur', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })
        ->get();

        return view('clients.index', compact('clients'));
    }



    public function create() {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        // Valide les données
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required',
            'adresse' => 'required',
        ]);

        // Crée un nouvel enregistrement dans la base de données
        Client::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('clients.index');
    }



    public function show(Client $client) {
        return view('clients.show', compact('client'));  // Retourne la vue pour afficher un client spécifique
    }

    public function edit(Client $client) {
        return view('clients.edit', compact('client'));  // Retourne la vue pour modifier un client
    }

    public function update(Request $request, Client $client) {
        // Validation des données d'entrée avec gestion de l'email unique en excluant l'email actuel
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,  // Exclut l'email du client actuel
            'telephone' => 'nullable|string|max:20',
        ]);

        // Mise à jour des données du client
        $client->update($validatedData);

        // Redirection avec message de succès
        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès');
    }

    public function destroy(Client $client) {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès');
    }
}
