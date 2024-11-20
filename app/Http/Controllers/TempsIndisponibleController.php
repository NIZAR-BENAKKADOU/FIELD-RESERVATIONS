<?php

namespace App\Http\Controllers;

use App\Models\TempsIndisponible;
use Illuminate\Http\Request;

class TempsIndisponibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temps_indisponibles = TempsIndisponible::all();
        return view('temps_indisponibles.index', compact('temps_indisponibles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('temps_indisponibles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $temps_indisponible = TempsIndisponible::create($request->all());
        return redirect()->route('temps_indisponibles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TempsIndisponible $temps_indisponible)
    {
        return view('temps_indisponibles.show', compact('temps_indisponible'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TempsIndisponible $temps_indisponible)
    {
        return view('temps_indisponibles.edit', compact('temps_indisponible'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TempsIndisponible $temps_indisponible)
    {
        $temps_indisponible->update($request->all());
        return redirect()->route('temps_indisponibles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TempsIndisponible $temps_indisponible)
    {
        $temps_indisponible->delete();
        return redirect()->route('temps_indisponibles.index');
    }
}
