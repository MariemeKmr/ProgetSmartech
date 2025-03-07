<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\documents\index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Liste des Documents</h1>

        <!-- Barre de recherche -->
        <form method="GET" action="{{ route('documents.index') }}" class="mb-6 flex mt-3">
            <input type="text" name="search" placeholder="Rechercher un document..."
                class="border p-2 w-1/3 rounded-lg mr-2" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-lg">Rechercher</button>
        </form>

        <!-- Boutons de navigation -->
        <div class="flex justify-between mb-6 mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary bg-gray-500 text-white px-4 py-2 rounded-lg">
                Accueil
            </a>
            <a href="{{ route('documents.create') }}" class="btn btn-primary bg-green-500 text-white px-4 py-2 rounded-lg">
                Ajouter un Document
            </a>
        </div>

        <!-- Table des documents -->
        <div class="overflow-x-auto">
            <table class="w-full mt-3 border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left px-4 py-2">Titre</th>
                        <th class="text-left px-4 py-2">Employé</th>
                        <th class="text-left px-4 py-2">Fichier</th>
                        <th class="text-left px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $document->titre }}</td>
                            <td class="py-2 px-4">{{ optional($document->employe)->email ?? 'Non attribué' }}</td>
                            <td class="py-2 px-4">
                                @if ($document->chemin)
                                    <a href="{{ asset('storage/' . $document->chemin) }}" target="_blank" class="text-blue-500 underline">
                                        Voir le fichier
                                    </a>
                                @else
                                    <span class="text-gray-500">Aucun fichier</span>
                                @endif
                            </td>
                            <td class="py-2 px-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('documents.show', $document) }}" class="btn btn-info">Voir</a>
                                    <a href="{{ route('documents.edit', $document) }}" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('documents.destroy', $document) }}" method="POST" style="display:inline;">
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
