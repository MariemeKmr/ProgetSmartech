<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\documents\edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg rounded-lg" style="max-width: 800px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Modifier le Document</h1>

                <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label">Titre du document</label>
                        <input type="text" name="titre" value="{{ old('titre', $document->titre) }}" required class="form-control">
                        @error('titre') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Description</label>
                        <textarea name="description" placeholder="Description du document" class="form-control">{{ old('description', $document->description) }}</textarea>
                        @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Fichier</label>
                        <input type="file" name="fichier" class="form-control">
                        @if ($document->chemin)
                            <p class="text-sm text-gray-600 mt-2">
                                <a href="{{ asset('storage/' . $document->chemin) }}" target="_blank" class="text-primary">
                                    Voir le fichier actuel
                                </a>
                            </p>
                        @endif
                        @error('fichier') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Employé associé</label>
                        <select name="employe_id" class="form-control">
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}" {{ $document->employe_id == $employe->id ? 'selected' : '' }}>
                                    {{ $employe->email }}
                                </option>
                            @endforeach
                        </select>
                        @error('employe_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
@endsection
