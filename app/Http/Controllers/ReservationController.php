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
            'terrain_id' => 'required|exists:terrains,id',
        ]);

        // Slot Blocking Logic
        $exists = Reservation::where('terrain_id', $request->terrain_id)
            ->where('date_de_reservation', $request->date_de_reservation)
            ->where(function ($query) use ($request) {
                $query->whereBetween('heure_debut', [$request->heure_debut, $request->heure_fin])
                      ->orWhereBetween('heure_fin', [$request->heure_debut, $request->heure_fin])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('heure_debut', '<=', $request->heure_debut)
                            ->where('heure_fin', '>=', $request->heure_fin);
                      });
            })
            ->exists();

        if ($exists) {
            return back()->withErrors(['error' => 'This time slot is already booked. Please choose another time.']);
        }

        $reservation = new Reservation();
        $reservation->users_id = auth()->id();
        $reservation->terrain_id = $request->terrain_id;
        $reservation->heure_debut = $request->heure_debut;
        $reservation->heure_fin = $request->heure_fin;
        $reservation->montant = $request->montant ?? 0;
        $reservation->date_de_reservation = $request->date_de_reservation;
        $reservation->date_de_match = $request->date_de_reservation; // Sync match date
        $reservation->verification_code = rand(1000, 9999); // Mock SMS code
        $reservation->save();

        // Store mock code in session for demo purposes
        session(['mock_code' => $reservation->verification_code]);

        return redirect()->route('reservations.verify', $reservation->id);
    }

    public function verify($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.verify', compact('reservation'));
    }

    public function confirm(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        
        if ($request->verification_code == $reservation->verification_code) {
            $reservation->verified_at = now();
            $reservation->save();
            return redirect()->route('dashboard')->with('success', 'Reservation confirmed successfully!');
        }

        return back()->withErrors(['verification_code' => 'Invalid verification code.']);
    }
    public function destroy(Reservation $reservation)
    {
        // Add your logic here to delete the specified reservation
        $reservation->delete();

        session()->flash('success', 'Reservation deleted successfully');
        return redirect()->route('reservations.index');
    }
}
