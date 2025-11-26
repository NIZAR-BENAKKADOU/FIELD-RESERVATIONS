<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class TerrainController extends Controller
{
    public function index(Request $request)
    {
        $query = Terrain::query();
        if (!empty($request->search)) {
            $search = trim($request->search);
            $query = $query->where(function (Builder $q) use ($search) {
                $q->whereRaw('LOWER(nom) LIKE ?', ["%" . strtolower($search) . "%"])
                    ->orWhereRaw('LOWER(adresse) LIKE ?', ["%" . strtolower($search) . "%"]);
            });
        }
        $terrains = $query->get();

        return view('terrains.index', compact('terrains'));
    }
    public function rate(Request $request, Terrain $terrain)
    {
        $request->validate([
            'rating' => 'required|integer|min=1|max=5',
        ]);

        $terrain->note = $request->rating;
        $terrain->save();

        return response()->json(['success' => true]);
    }

    public function create()
    {
        $villes = Ville::all();
        return view('terrains.create', compact('villes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'note' => 'required|numeric|min:0|max:5',
            'ville_id' => 'required|exists:villes,id',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i',
            'jour_off' => 'required|string|max:10',
            'heure_debut_off' => 'required|date_format:H:i',
            'heure_fin_off' => 'required|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->hasFile('image') ? $request->file('image')->store("image_terrain") : 'image_terrain/no-image.jpg';

        Terrain::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'prix' => $request->prix,
            'note' => $request->note,
            'ville_id' => $request->ville_id,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'jour_off' => $request->jour_off,
            'heure_debut_off' => $request->heure_debut_off,
            'heure_fin_off' => $request->heure_fin_off,
            'image' => $path,
        ]);

        return redirect()->route('terrains.index')->with('ajouter', 'Terrain added successfully');
    }

    public function show(Terrain $terrain)
    {
        $villes = Ville::all();
        return view('terrains.show', compact('terrain', 'villes'));
    }

    public function edit(Terrain $terrain)
    {
        $villes = Ville::all();
        return view('terrains.edit', compact('terrain', 'villes'));
    }

    public function update(Request $request, Terrain $terrain)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'note' => 'required|numeric|min:0|max:5',
            'ville_id' => 'required|exists:villes,id',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i',
            'jour_off' => 'required|string|max:10',
            'heure_debut_off' => 'required|date_format:H:i',
            'heure_fin_off' => 'required|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'nom', 'adresse', 'prix', 'note', 'ville_id', 'heure_debut',
            'heure_fin', 'jour_off', 'heure_debut_off', 'heure_fin_off'
        ]);

        if ($request->hasFile('image')) {
            if ($terrain->image && $terrain->image != 'image_terrain/no-image.jpg') {
                Storage::delete($terrain->image);
            }
            $data['image'] = $request->file('image')->store("image_terrain");
        } else {
            $data['image'] = $terrain->image;
        }

        $terrain->update($data);

        return redirect()->route('terrains.index')->with('modifier', 'Terrain updated successfully');
    }

    public function destroy(Terrain $terrain)
    {
        if ($terrain->image && $terrain->image != 'image_terrain/no-image.jpg') {
            Storage::delete($terrain->image);
        }

        $terrain->delete();

        return redirect()->route('terrains.index')->with('supprimer', 'Terrain deleted successfully');
    }
    public function storeComment(Request $request, Terrain $terrain)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $terrain->commentaires()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }
}
