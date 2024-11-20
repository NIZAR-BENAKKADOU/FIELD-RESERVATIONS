@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Créer une nouvelle réservation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reservations.store') }}">
                        @csrf

                        <!-- User ID -->
                        <div class="form-group row">
                            <label for="users_nom"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nom Utilisateur') }}</label>
                            <div class="col-md-6">
                                <input type="text" id="users_nom" name="users_nom" class="form-control"
                                    value="{{ $currentUser->nom }}" readonly>
                                <input type="hidden" name="users_id" value="{{ auth()->id() }}">
                            </div>
                        </div>

                        <!-- Terrain -->
                        <div class="form-group row">
                            <label for="terrain_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('Terrain') }}</label>
                            <div class="col-md-6">
                                <input type="text" id="terrain_id" name="terrain_id" class="form-control"
                                    value="{{ $terrain->nom }}" readonly>
                                <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">
                            </div>
                        </div>

                        <!-- Montant -->
                        <div class="form-group row">
                            <label for="montant"
                                class="col-md-4 col-form-label text-md-right">{{ __('Montant') }}</label>
                            <div class="col-md-6">
                                <input type="number" id="montant" name="montant" step="0.01" class="form-control"
                                    value="{{ $terrain->prix }}" readonly>
                            </div>
                        </div>
                        <!-- Heure de début -->
                        <div class="form-group row">
                            <label for="heure_debut"
                                class="col-md-4 col-form-label text-md-right">{{ __('Heure de début') }}</label>
                            <div class="col-md-6">
                                <select id="heure_debut" class="form-control @error('heure_debut') is-invalid @enderror"
                                    name="heure_debut">
                                    @for ($hour = 16; $hour <= 24; $hour++)
                                        <option value="{{ sprintf('%02d', $hour) }}:00">{{ sprintf('%02d', $hour) }}:00
                                        </option>
                                    @endfor
                                </select>
                                @error('heure_debut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Heure de fin -->
                        <div class="form-group row">
                            <label for="heure_fin"
                                class="col-md-4 col-form-label text-md-right">{{ __('Heure de fin') }}</label>
                            <div class="col-md-6">
                                <select id="heure_fin" class="form-control @error('heure_fin') is-invalid @enderror"
                                    name="heure_fin">
                                    <option value="">Sélectionner une heure de fin</option>
                                </select>
                                @error('heure_fin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('#heure_debut').change(function () {
                                    var selectedStartTime = $(this).val();
                                    $('#heure_fin').empty();
                                    if (selectedStartTime) {
                                        var startHour = parseInt(selectedStartTime.substring(0, 2));
                                        // If the selected start time is before 11 PM
                                        if (startHour < 23) {
                                            for (var hour = startHour + 1; hour <= 24; hour++) {
                                                $('#heure_fin').append($('<option>', {
                                                    value: ('0' + hour).slice(-2) + ':00',
                                                    text: ('0' + hour).slice(-2) + ':00'
                                                }));
                                            }
                                        } else {
                                            // If the selected start time is 11 PM or later, limit end time to midnight
                                            $('#heure_fin').append($('<option>', {
                                                value: '00:00',
                                                text: '00:00'
                                            }));
                                        }
                                    }
                                });
                            });
                        </script>


                        <!-- Date de réservation -->
                        <div class="form-group row">
                            <label for="date_de_reservation"
                                class="col-md-4 col-form-label text-md-right">{{ __('Date de réservation') }}</label>
                            <div class="col-md-6">
                                <input id="date_de_reservation" type="date"
                                    class="form-control @error('date_de_reservation') is-invalid @enderror"
                                    name="date_de_reservation">
                                @error('date_de_reservation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Créer la réservation') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection