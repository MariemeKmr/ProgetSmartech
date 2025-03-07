<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\clients\index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Liste des Clients</h1>

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('clients.index') }}" class="mb-6 flex mt-3">
            <input type="text" name="search" placeholder="Rechercher un client..."
                class="border p-2 w-1/3 rounded-lg mr-2" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-lg">Rechercher</button>
        </form>

        <!-- Boutons de navigation -->
        <div class="flex justify-between mb-6 mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary bg-gray-500 text-white px-4 py-2 rounded-lg">
                Accueil
            </a>
            <a href="{{ route('clients.create') }}" class="btn btn-primary bg-green-500 text-white px-4 py-2 rounded-lg">
                Ajouter un Client
            </a>
        </div>

        <!-- Tableau des clients -->
        <div class="overflow-x-auto">
            <table class="w-full mt-3 border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left px-4 py-2">Nom</th>
                        <th class="text-left px-4 py-2">Prénom</th>
                        <th class="text-left px-4 py-2">Secteur</th>
                        <th class="text-left px-4 py-2">Email</th>
                        <th class="text-left px-4 py-2">Adresse</th>
                        <th class="text-center px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $client->nom }}</td>
                            <td class="py-2 px-4">{{ $client->prenom }}</td>
                            <td class="py-2 px-4">{{ $client->secteur }}</td>
                            <td class="py-2 px-4">{{ $client->email }}</td>
                            <td class="py-2 px-4">{{ $client->adresse }}</td>
                            <td class="py-2 px-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('clients.show', $client) }}" class="btn btn-info">Voir</a>
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
