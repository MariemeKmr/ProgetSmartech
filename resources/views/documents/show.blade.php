<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\documents\show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg rounded-lg" style="max-width: 800px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Détails du Document</h1>
                <p class="card-text"><strong>Titre :</strong> {{ $document->titre }}</p>
                <p class="card-text"><strong>Description :</strong> {{ $document->description }}</p>
                <p class="card-text"><strong>Employé :</strong> {{ $document->employe->email }}</p>
                <p class="card-text"><strong>Fichier :</strong></p>
                @if ($document->chemin)
                    <div class="mb-4">
                        <a href="{{ asset('storage/' . $document->chemin) }}" target="_blank" class="btn btn-primary">Voir le fichier</a>
                        <a href="{{ asset('storage/' . $document->chemin) }}" download class="btn btn-secondary">Télécharger</a>
                    </div>
                @else
                    <p class="text-gray-500">Aucun fichier</p>
                @endif
                <div class="text-center mt-4">
                    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
@endsection
