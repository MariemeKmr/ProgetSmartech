@extends('layouts.app') @section('content')
<div class="container">
    <div>
        <h1>Liste des employés</h1>

        <!-- Formulaire de recherche -->
        <form
            method="GET"
            action="{{ route('employes.index') }}"
            class="flex space-x-2 w-auto mb-4">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Rechercher un employé..."
                class="border p-2 w-96"/>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        <div class="flex items-center justify-between mb-4">
            <a href="{{ route('home') }}" class="btn btn-primary">Acceuil</a>
            <a href="{{ route('employes.create') }}" class="btn btn-primary">Ajouter un employé</a>
        </div>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Poste</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employes as $employe)
                <tr>
                    <td>{{ $employe->nom }}</td>
                    <td>{{ $employe->prenom }}</td>
                    <td>{{ $employe->poste }}</td>
                    <td>{{ $employe->email }}</td>
                    <td>
                        <a href="{{ route('employes.show', $employe->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-warning">Modifier</a>
                        <form
                            action="{{ route('employes.destroy', $employe->id) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
