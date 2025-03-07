<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold mb-6">Bienvenue sur votre tableau de bord</h1>

    <!-- Cartes de navigation -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Gestion des employés</h5>
                    <p class="card-text">Gérez les informations de vos employés.</p>
                    <a href="{{ route('employes.index') }}" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-file-alt fa-3x mb-3 text-secondary"></i>
                    <h5 class="card-title">Gestion des documents</h5>
                    <p class="card-text">Gérez vos documents importants.</p>
                    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-user-tie fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Gestion des clients</h5>
                    <p class="card-text">Gérez les informations de vos clients.</p>
                    <a href="{{ route('clients.index') }}" class="btn btn-success">Accéder</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
