<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\employes\edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg rounded-lg" style="max-width: 800px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Modifier l'Employé</h1>

                <form action="{{ route('employes.update', $employe->id) }}" method="POST">
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
                        <label class="form-label">Nom :</label>
                        <input type="text" name="nom" value="{{ old('nom', $employe->nom) }}" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Email :</label>
                        <input type="email" name="email" value="{{ old('email', $employe->email) }}" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Téléphone :</label>
                        <input type="text" name="telephone" value="{{ old('telephone', $employe->telephone) }}" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Poste :</label>
                        <input type="text" name="poste" value="{{ old('poste', $employe->poste) }}" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Date d'embauche :</label>
                        <input type="date" name="date_embauche" id="date_embauche" value="{{ old('date_embauche', $employe->date_embauche ?? '') }}" class="form-control" required>
                        @error('date_embauche')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('employes.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
@endsection
