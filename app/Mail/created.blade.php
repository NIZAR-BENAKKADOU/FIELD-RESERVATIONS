@component('mail::message')
# Nouvelle réservation créée

**Nom Utilisateur:** {{ $reservation->users_nom }}

**ID Terrain:** {{ $reservation->terrain_id }}

**Heure de début:** {{ $reservation->heure_debut }}

**Heure de fin:** {{ $reservation->heure_fin }}

**Montant:** {{ $reservation->montant }}

**Validée:** {{ $reservation->validee ? 'Oui' : 'Non' }}

**Date de réservation:** {{ $reservation->date_de_reservation }}

**Date de match:** {{ $reservation->date_de_match }}

Merci,<br>
{{ config('app.name') }}
@endcomponent
