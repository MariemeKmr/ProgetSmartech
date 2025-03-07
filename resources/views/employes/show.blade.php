<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\employes\show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-0">
        <div class="card shadow-lg rounded-lg" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Détails de l'Employé</h1>
                <p class="card-text"><strong>Nom :</strong> {{ $employe->nom }}</p>
                <p class="card-text"><strong>Prenom :</strong> {{ $employe->prenom }}</p>
                <p class="card-text"><strong>Email :</strong> {{ $employe->email }}</p>
                <p class="card-text"><strong>Téléphone :</strong> {{ $employe->telephone }}</p>
                <p class="card-text"><strong>Poste :</strong> {{ $employe->poste }}</p>
                <div class="text-center mt-4">
                    <a href="{{ route('employes.index') }}" class="btn btn-primary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
@endsection
