<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::all();
        return response()->json($enderecos);
    }

    public function show($id)
    {
        $endereco = Endereco::findOrFail($id);
        return response()->json($endereco);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cep' => 'required|string|max:8',
            'logradouro' => 'required|string|max:8',
            'numero' => 'required|integer',
            'complemento' => 'nullable|string',
            'bairro_id' => 'required|exists:bairros,id',
        ]);

        $endereco = Endereco::create([
            'cep' => $validatedData['cep'],
            'logradouro' => $validatedData['logradouro'],
            'numero' => $validatedData['numero'],
            'complemento' => $validatedData['complemento'],
            'bairro_id' => $validatedData['bairro_id'],
        ]);

        return response()->json($endereco, 201);
    }

    public function update(Request $request, $id)
    {
        $endereco = Endereco::findOrFail($id);

        $validatedData = $request->validate([
            'cep' => 'required|string|max:8',
            'logradouro' => 'required|string|max:8',
            'numero' => 'required|integer',
            'complemento' => 'nullable|string',
            'bairro_id' => 'required|exists:bairros,id',
        ]);

        $endereco->update([
            'cep' => $validatedData['cep'],
            'logradouro' => $validatedData['logradouro'],
            'numero' => $validatedData['numero'],
            'complemento' => $validatedData['complemento'],
            'bairro_id' => $validatedData['bairro_id'],
        ]);

        return response()->json($endereco, 200);
    }

    public function destroy($id)
    {
        $endereco = Endereco::findOrFail($id);

        $endereco->delete();

        return response()->json(null, 204);
    }    
}