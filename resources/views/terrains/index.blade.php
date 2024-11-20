@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mt-4 mb-5">Liste des terrains:</h2>
    <br>
    
    @if(session()->has("ajouter"))
    <div class="alert alert-success">
        {{ session("ajouter") }}
    </div>
    @endif
    @if(session()->has("modifier"))
    <div class="alert alert-success">
        {{ session("modifier") }}
    </div>
    @endif
    @if(session()->has("delete"))
    <div class="alert alert-danger">
        {{ session("delete") }}
    </div>
    @endif
    @if(auth()->user()->isAdmin())
    <a href="{{ route('terrains.create') }}" class="btn-new">Nouveau terrain <i class="bi bi-plus-circle"></i></a>
    @endif
    @isset($terrains)
    <div class="table-responsive">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Prix</th>
                    <th>Note</th>
                    <th>Horaires</th>
                    <th>Jour Off</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($terrains as $terrain)
                <tr>
                    <td class="text-center">
                        <div class="thumbnail">
                            @if(!empty($terrain->image))
                            <img src="{{ asset($terrain->image) }}" alt="image" width="80px" class="rounded">
                            @else
                            <img src="{{ asset('image_terrain/no-image.jpg') }}" alt="no-image" width="80px" class="rounded">
                            @endif
                        </div>
                    </td>
                    <td>{{ $terrain->nom }}</td>
                    <td>{{ $terrain->adresse }}</td>
                    <td>{{ $terrain->ville->nom }}</td>
                    <td>{{ $terrain->prix }}</td>
                    <td>
                        <div class="star-rating" data-id="{{ $terrain->id }}">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $terrain->note ? 'rated' : '' }}" data-rating="{{ $i }}"></i>
                            @endfor
                        </div>
                        <span class="note-value">{{ $terrain->note }}</span>
                    </td>
                    <td>{{ $terrain->heure_debut }} - {{ $terrain->heure_fin }}</td>
                    <td>{{ $terrain->jour_off }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('reservations.create', $terrain->id) }}" class="btn-reserve">Réserver</a>
                            @if(auth()->user()->isAdmin())
                            <a href="{{ route('terrains.edit', ['terrain' => $terrain->id]) }}" class="btn-edit">Modifier</a>
                            <button class="btn-delete" onclick="deleteTerrain({{ $terrain->id }}, '{{ $terrain->nom }}')">Supprimer</button>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">Aucun terrain n'est disponible</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endisset
</div>

<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .custom-table th,
    .custom-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .custom-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .custom-table tr:hover {
        background-color: #f5f5f5;
    }

    .btn-new,
    .btn-reserve,
    .btn-edit,
    .btn-delete {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-new {
        color: #fff;
        background-color: #ff9800;
        border-color: #e68a00;
    }

    .btn-reserve {
        color: #fff;
        background-color: #ff9800;
        border-color: #e68a00;
    }

    .btn-edit {
        color: #fff;
        background-color: #ff9800;
        border-color: #e68a00;
    }
    .btn-delete {
        color: #fff;
        background-color: #ff9800;
        border-color: #e68a00;
    }

    .btn-new:hover,
    .btn-reserve:hover,
    .btn-edit:hover,
    .btn-delete:hover {
        background-color: #e68a00;
    }

    .h2 {
        color: #ff9800;
        font-weight: bold;
        font-size: 20px;
        font-style: italic;
        font-family: cursive;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .star-rating {
        display: inline-block;
    }

    .star-rating .fa-star {
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s;
    }

    .star-rating .fa-star.rated {
        color: #ff9800;
    }

    .star-rating .fa-star:hover,
    .star-rating .fa-star:hover ~ .fa-star {
        color: #ff9800;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const stars = document.querySelectorAll('.star-rating .fa-star');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const rating = this.getAttribute('data-rating');
                const starRatingDiv = this.parentElement;
                const terrainId = starRatingDiv.getAttribute('data-id');
                const noteValueSpan = starRatingDiv.nextElementSibling;

                // Update the stars
                updateStars(starRatingDiv, rating);

                // Update the note value
                noteValueSpan.textContent = rating;

                // Send the new rating to the server via AJAX
                updateTerrainRating(terrainId, rating);
            });
        });

        function updateStars(starRatingDiv, rating) {
            const stars = starRatingDiv.querySelectorAll('.fa-star');
            stars.forEach(star => {
                if (star.getAttribute('data-rating') <= rating) {
                    star.classList.add('rated');
                } else {
                    star.classList.remove('rated');
                }
            });
        }

        function updateTerrainRating(terrainId, rating) {
            fetch(`/terrains/${terrainId}/rate`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ rating: rating })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Rating updated successfully');
                } else {
                    console.error('Failed to update rating');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
</script>
@if(session()->has("ajouter"))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i>
    <div>
        {{ session("ajouter") }}
    </div>
</div>
@endif

@if(session()->has("modifier"))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <i class="bi bi-pencil-fill me-2"></i>
    <div>
        {{ session("modifier") }}
    </div>
</div>
@endif

@if(session()->has("delete"))
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <i class="bi bi-trash-fill me-2"></i>
    <div>
        {{ session("delete") }}
    </div>
</div>
@endif
@endsection