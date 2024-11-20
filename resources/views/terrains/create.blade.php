@extends('layouts.app')

@section('content')
<h1 class="mt-2 mb-2">Nouveau terrain</h1>
<form action="{{ route('terrains.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
        @error('nom')
        <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Adresse</label>
        <textarea class="form-control" rows="3" name="adresse">{{ old('adresse') }}</textarea>
        @error('adresse')
        <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="ville" class="form-label">Ville</label>
        <select class="form-select" name="ville_id">
            <option value="">Sélectionnez une ville</option>
            @foreach($villes as $ville)
            <option value="{{ $ville->id }}" {{ old('ville_id') == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
            @endforeach
        </select>
        @error('ville_id')
        <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Prix</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="prix" value="{{ old('prix') }}">
            <span class="input-group-text">dhs</span>
        </div>
        @error('prix')
        <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
        @enderror
    </div>

 

    <div class="mb-3">
        <label class="form-label">Heure Début</label>
        <input type="time" class="form-control" name="heure_debut" value="{{ old('heure_debut') }}">
        @error('heure_debut')
        <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Heure Fin</label>
        <input type="time" class="form-control" name="heure_fin" value="{{ old('heure_fin') }}">
        @error('heure_fin')
        <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
        @enderror
    </div>

  

 

    <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" class="form-control" name="image">
        @error('image')
        <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i> {{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-outline-primary">Submit <i class="bi bi-plus-circle"></i></button>
</form>
@endsection
