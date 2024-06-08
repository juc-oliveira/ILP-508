<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cavalo;

class CavaloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cavalos = Cavalo::all();
        return view('cavalos.index', compact('cavalos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cavalos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'raca' => 'required|max:255',

        ]);

        Cavalo::create($request->all());

        return redirect()->route('cavalos.index')
                        ->with('success', 'Cavalo criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cavalo = Cavalo::findOrFail($id);
        return view('cavalos.show', compact('cavalo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cavalo = Cavalo::findOrFail($id);
        return view('cavalos.edit', compact('cavalo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'raca' => 'required|max:255',
        ]);

        $cavalo = Cavalo::findOrFail($id);
        $cavalo->update($request->all());

        return redirect()->route('cavalos.index')
                        ->with('success', 'Cavalo atualizado com sucesso.');
    }

    public function delete($id)
    {
        $cavalo = Cavalo::findOrFail($id);
        return view('cavalos.delete', compact('cavalo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cavalo = Cavalo::findOrFail($id);
        $cavalo->delete();

        return redirect()->route('cavalos.index')
                        ->with('success', 'Cavalo deletado com sucesso.');
    }
}
