<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\clients\edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg rounded-lg" style="max-width: 800px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Modifier le Client</h1>

                <form action="{{ route('clients.update', $client) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $client->nom) }}" required class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $client->prenom) }}" required class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="telephone" class="form-label">Téléphone :</label>
                        <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $client->telephone) }}" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="adresse" class="form-label">Adresse :</label>
                        <input type="text" name="adresse" id="adresse" value="{{ old('adresse', $client->adresse) }}" class="form-control">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
@endsection
