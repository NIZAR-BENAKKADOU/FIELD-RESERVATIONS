@extends('layouts.app')

@section('content')

<div class="container">
    @php $hasReservations = false; @endphp
    <div class="row g-4">
        @forelse($reservations as $reservation)
            @if(auth()->user()->isAdmin() || auth()->user()->id === $reservation->users_id)
                @php $hasReservations = true; @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 d-flex flex-column">
                        <div class="card-header d-flex align-items-center">
                            @if(!empty($reservation->terrain->image))
                                <img src="{{ asset($reservation->terrain->image) }}" alt="image" class="img-fluid rounded-circle" width="60px" />
                            @else
                                <img src="{{ asset('image_terrain/no-image.jpg') }}" alt="no-image" class="img-fluid rounded-circle" width="60px" />
                            @endif
                            <div class="ms-3">
                                <p class="mb-0"><strong>{{ $reservation->terrain->nom }}</strong></p>
                            </div>
                        </div>
                        <div class="card-body flex-grow-1">
                            <p><strong>{{ __('Nom Utilisateur:') }}</strong> {{ $reservation->user->nom }}</p>
                            <p><strong>{{ __('Heure de début:') }}</strong> {{ $reservation->heure_debut }}</p>
                            <p><strong>{{ __('Heure de fin:') }}</strong> {{ $reservation->heure_fin }}</p>
                            <p><strong>{{ __('Montant:') }}</strong> {{ $reservation->montant }}</p>
                            <p><strong>{{ __('Date de réservation:') }}</strong> {{ $reservation->date_de_reservation }}</p>
                        </div>
                        @if(auth()->user()->isAdmin())
                            <div class="card-footer d-flex justify-content-between">
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Supprimer') }} <i class="bi bi-trash2"></i></button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @empty
            <p>{{ __('Aucune réservation trouvée.') }}</p>
        @endforelse
    </div>
    @if (!$hasReservations)
        <p>{{ __('Aucune réservation trouvée.') }}</p>
    @endif
</div>
<script>

document.addEventListener('DOMContentLoaded', function () {
    // Function to delete a reservation
    function deleteReservation(reservationId) {
        fetch(`/reservations/${reservationId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (response.ok) {
                console.log('Reservation deleted successfully');
                // Optionally remove the reservation element from the DOM
                document.getElementById(`reservation-${reservationId}`).remove();
            } else {
                console.error('Failed to delete reservation');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Check each reservation to see if it's older than 24 hours
    const reservations = document.querySelectorAll('.reservation');
    reservations.forEach(reservation => {
        const reservationDate = new Date(reservation.dataset.date);
        const now = new Date();
        const timeDiff = now - reservationDate;

        // If the difference is greater than 24 hours (in milliseconds)
        if (timeDiff > 24 * 60 * 60 * 1000) {
            const reservationId = reservation.dataset.id;
            deleteReservation(reservationId);
        }
    });
});
</script>

@endsection
