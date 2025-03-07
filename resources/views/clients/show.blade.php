<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\clients\show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg rounded-lg" style="max-width: 800px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Détails du Client</h1>
                <p class="card-text"><strong>Nom :</strong> {{ $client->nom }}</p>
                <p class="card-text"><strong>Prenom :</strong> {{ $client->prenom }}</p>
                <p class="card-text"><strong>Email :</strong> {{ $client->email }}</p>
                <p class="card-text"><strong>Téléphone :</strong> {{ $client->telephone }}</p>
                <p class="card-text"><strong>Adresse :</strong> {{ $client->adresse }}</p>
                <div class="text-center mt-4">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
@endsection
