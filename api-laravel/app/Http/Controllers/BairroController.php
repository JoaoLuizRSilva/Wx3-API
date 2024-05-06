<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bairro;

class BairroController extends Controller
{
    public function index()
    {
        $bairros = Bairro::all();
        return response()->json($bairros);
    }

    public function show($id)
    {
        $bairro = Bairro::findOrFail($id);
        return response()->json($bairro);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $bairro = Bairro::create([
            'nome' => $validatedData['nome'],
            'cidade_id' => $validatedData['cidade_id'],
        ]);

        return response()->json($bairro, 201);
    }

    public function update(Request $request, $id)
    {
        $bairro = Bairro::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $bairro->update([
            'nome' => $validatedData['nome'],
            'cidade_id' => $validatedData['cidade_id'],
        ]);

        return response()->json($bairro, 200);
    }

    public function destroy($id)
    {
        $bairro = Bairro::findOrFail($id);

        $bairro->delete();

        return response()->json(null, 204);
    }    
}