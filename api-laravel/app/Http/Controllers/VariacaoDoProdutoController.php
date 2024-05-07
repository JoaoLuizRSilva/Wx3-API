<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VariacaoDoProduto;

class VariacaoDoProdutoController extends Controller
{
    public function index()
    {
        $variacoes = VariacaoDoProduto::all();
        return response()->json($variacoes);
    }

    public function show($id)
    {
        $variacao = VariacaoDoProduto::findOrFail($id);
        return response()->json($variacao);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tamanho' => 'required|string|max:15',
            'estoque' => 'required|integer|min:0',
            'preco_venda' => 'required|decimal|min:0',
            'produto_id' => 'required|exists:produtos,id',
        ]);

        $variacao = VariacaoDoProduto::create([
            'tamanho' => $validatedData['tamanho'],
            'estoque' => $validatedData['estoque'],
            'preco_venda' => $validatedData['preco_venda'],
            'produto_id' => $validatedData['produto_id'],
        ]);

        return response()->json($variacao, 201);
    }

    public function update(Request $request, $id)
    {
        $variacao = VariacaoDoProduto::findOrFail($id);

        $validatedData = $request->validate([
            'tamanho' => 'required|string|max:15',
            'estoque' => 'required|integer|min:0',
            'preco_venda' => 'required|decimal|min:0',
            'produto_id' => 'required|exists:produtos,id',
        ]);

        $variacao->update([
            'tamanho' => $validatedData['tamanho'],
            'estoque' => $validatedData['estoque'],
            'preco_venda' => $validatedData['preco_venda'],
            'produto_id' => $validatedData['produto_id'],
        ]);

        return response()->json($variacao, 200);
    }

    public function destroy($id)
    {
        $variacao = VariacaoDoProduto::findOrFail($id);

        $variacao->delete();

        return response()->json(null, 204);
    }    
}