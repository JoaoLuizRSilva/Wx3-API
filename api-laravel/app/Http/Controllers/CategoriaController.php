<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:25',
            'descricao' => 'nullable|string',
        ]);

        $categoria = Categoria::create([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'],
        ]);

        return response()->json($categoria, 201);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:25',
            'descricao' => 'nullable|string',
        ]);

        $categoria->update([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'],
        ]);

        return response()->json($categoria, 200);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return response()->json(null, 204);
    }    
}