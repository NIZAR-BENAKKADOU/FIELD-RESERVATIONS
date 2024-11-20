<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Terrain;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create($id)
    {
        $terrain = Terrain::find($id);
        $currentUser = auth()->user(); // Utilisateur actuellement connecté
        return view('reservations.create', compact('currentUser', 'terrain'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'date_de_reservation' => 'required',
           
        ]);

        $reservation = new Reservation();
        $reservation->users_id = auth()->id();
        $reservation->terrain_id = $request->terrain_id;
        $reservation->heure_debut = $request->heure_debut;
        $reservation->heure_fin = $request->heure_fin;
        $reservation->montant = $request->montant;
        $reservation->date_de_reservation = $request->date_de_reservation;
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Réservation créée avec succès');
    }
    public function destroy(Reservation $reservation)
    {
        // Add your logic here to delete the specified reservation
        $reservation->delete();

        session()->flash('success', 'Reservation deleted successfully');
        return redirect()->route('reservations.index');
    }
}
