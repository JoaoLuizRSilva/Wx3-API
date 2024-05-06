<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json($produto);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cor' => 'nullable|string|max:255',
            'imagem' => 'nullable|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'data_cadastro' => 'required|date',
            'peso' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $produto = Produto::create([
            'nome' => $validatedData['nome'],
            'cor' => $validatedData['cor'],
            'imagem' => $validatedData['imagem'],
            'preco' => $validatedData['preco'],
            'descricao' => $validatedData['descricao'],
            'data_cadastro' => $validatedData['data_cadastro'],
            'peso' => $validatedData['peso'],
            'categoria_id' => $validatedData['categoria_id'],
        ]);

        return response()->json($produto, 201);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cor' => 'nullable|string|max:255',
            'imagem' => 'nullable|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'data_cadastro' => 'required|date',
            'peso' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $produto->update([
            'nome' => $validatedData['nome'],
            'cor' => $validatedData['cor'],
            'imagem' => $validatedData['imagem'],
            'preco' => $validatedData['preco'],
            'descricao' => $validatedData['descricao'],
            'data_cadastro' => $validatedData['data_cadastro'],
            'peso' => $validatedData['peso'],
            'categoria_id' => $validatedData['categoria_id'],
        ]);

        return response()->json($produto, 200);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return response()->json(null, 204);
    }    
}