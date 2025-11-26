<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Terrain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Stats
        $totalUsers = User::count();
        $onlineUsers = User::where('updated_at', '>=', now()->subMinutes(15))->count(); // Mocking online users based on activity
        $myReservationsCount = Reservation::where('users_id', $user->id)->count();
        
        // Data
        $reservations = Reservation::where('users_id', $user->id)->with('terrain')->latest()->take(5)->get();
        $terrains = Terrain::all();

        // Get next upcoming reservation for countdown
        $nextReservation = Reservation::where('users_id', $user->id)
            ->where('date_de_reservation', '>=', now()->toDateString())
            ->orderBy('date_de_reservation', 'asc')
            ->with('terrain')
            ->first();

        return view('dashboard', compact('terrains', 'totalUsers', 'onlineUsers', 'myReservationsCount', 'reservations', 'nextReservation'));
    }

    public function userCount()
    {
        return response()->json([
            'userCount' => User::count()
        ]);
    }
}
