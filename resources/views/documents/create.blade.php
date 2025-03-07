<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\documents\create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg rounded-lg" style="max-width: 800px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Ajouter un Document</h1>

                <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="titre" class="form-label">Titre du document</label>
                        <input type="text" name="titre" id="titre" placeholder="Titre du document" required class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="fichier" class="form-label">Fichier</label>
                        <input type="file" name="fichier" id="fichier" required class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="employe_id" class="form-label">Sélectionner un employé</label>
                        <select name="employe_id" id="employe_id" class="form-control">
                            <option value="">Sélectionner un employé</option>
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}">{{ $employe->email }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
@endsection
