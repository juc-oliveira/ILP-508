<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:clientes',
            'telefone' => 'nullable|max:15'
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
                        ->with('success', 'Cliente criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:clientes,email,' . $id,
            'telefone' => 'nullable|max:15'
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')
                        ->with('sucess', 'Cliente atualizado com sucesso.');
    }

    public function delete($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.delete', compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')
                        ->with('success', 'Cliente deletado com sucesso.');
    }
}
