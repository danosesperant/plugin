<?php
// src/Http/Controllers/VoitureController.php
namespace PluginVoiture\Http\Controllers;

use App\Http\Controllers\Controller;
use PluginVoiture\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();
        return view('pluginVoiture::voitures.index', compact('voitures'));
    }

    public function create()
    {
        return view('pluginVoiture::voitures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required|integer|min:1886|max:'.(date('Y') + 1),
            'prix' => 'required|numeric',
        ]);

        Voiture::create($request->all());

        return redirect()->route('voitures.index')
                         ->with('success', 'Voiture créée avec succès.');
    }

    public function show(Voiture $voiture)
    {
        return view('pluginVoiture::voitures.show', compact('voiture'));
    }

    public function edit(Voiture $voiture)
    {
        return view('pluginVoiture::voitures.edit', compact('voiture'));
    }

    public function update(Request $request, Voiture $voiture)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required|integer|min:1886|max:'.(date('Y') + 1),
            'prix' => 'required|numeric',
        ]);

        $voiture->update($request->all());

        return redirect()->route('voitures.index')
                         ->with('success', 'Voiture mise à jour avec succès.');
    }

    public function destroy(Voiture $voiture)
    {
        $voiture->delete();

        return redirect()->route('voitures.index')
                         ->with('success', 'Voiture supprimée avec succès.');
    }
}
