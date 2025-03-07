<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\employes\create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg rounded-lg" style="max-width: 800px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Ajouter un employé</h1>

                <form action="{{ route('employes.store') }}" method="POST">
                    @csrf

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
                        <label class="form-label">Nom :</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Prénom :</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Poste :</label>
                        <input type="text" name="poste" id="poste" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Email :</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Téléphone :</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Date d'embauche :</label>
                        <input type="date" name="date_embauche" id="date_embauche" value="{{ old('date_embauche', '') }}" class="form-control" required>
                        @error('date_embauche')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('employes.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
@endsection
