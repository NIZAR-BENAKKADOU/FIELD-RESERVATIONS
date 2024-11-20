@extends('layouts.app')

@section('content')
@isset($terrain)
<h1 class="mt-2 mb-2">Modifier le terrain numéro {{ $terrain->id }}</h1>
<form action="{{ route('terrains.update', $terrain->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" value="{{ old('nom', $terrain->nom) }}">
    </div>
    @error('nom')
    <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i>{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label class="form-label">Adresse</label>
        <textarea class="form-control" rows="3" name="adresse">{{ old('adresse', $terrain->adresse) }}</textarea>
    </div>
    @error('adresse')
    <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i>{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label class="form-label">Ville</label>
        <select class="form-select" name="ville_id">
            <option value="">Sélectionnez une ville</option>
            @foreach($villes as $ville)
            <option value="{{ $ville->id }}" {{ old('ville_id', $terrain->ville_id) == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
            @endforeach
        </select>
    </div>
    @error('ville_id')
    <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i>{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label class="form-label">Prix</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="prix" value="{{ old('prix', $terrain->prix) }}">
            <span class="input-group-text">dhs</span>
        </div>
    </div>
    @error('prix')
    <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i>{{ $message }}</div>
    @enderror



    <div class="mb-3">
        <label class="form-label">Heure Debut</label>
        <input type="time" class="form-control" name="heure_debut" value="{{ old('heure_debut', $terrain->heure_debut) }}">
    </div>
    @error('heure_debut')
    <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i>{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label class="form-label">Heure Fin</label>
        <input type="time" class="form-control" name="heure_fin" value="{{ old('heure_fin', $terrain->heure_fin) }}">
    </div>
    @error('heure_fin')
    <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i>{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label class="form-label">Jour Off</label>
        <input type="text" class="form-control" name="jour_off" value="{{ old('jour_off', $terrain->jour_off) }}">
    </div>
    @error('jour_off')
    <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i>{{ $message }}</div>
    @enderror

 

    <div class="mb-3">
        @if(!empty($terrain->image))
        <img src="{{ asset($terrain->image) }}" alt="image" width="40%" /><br>
        @else
        <img src="{{ asset('image_terrain/no-image.jpg') }}" alt="no-image" width="40%" /><br>
        @endif
        <input type="file" class="form-control" name="image">
    </div>
    @error('image')
    <div class="alert alert-danger mt-2"><i class="bi bi-x-circle-fill"></i>{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-outline-primary">Modifier <i class="bi bi-pencil"></i></button>
</form>
@endisset
@endsection
