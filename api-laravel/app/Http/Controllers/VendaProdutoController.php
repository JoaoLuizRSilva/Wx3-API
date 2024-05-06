<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendaProduto;

class VendaProdutoController extends Controller
{
    public function index()
    {
        $vendasProdutos = VendaProduto::all();
        return response()->json($vendasProdutos);
    }

    public function show($id)
    {
        $vendaProduto = VendaProduto::findOrFail($id);
        return response()->json($vendaProduto);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'preco_venda' => 'required|numeric|min:0',
            'variacao_do_produto_id' => 'required|exists:variacao_do_produtos,id',
            'venda_id' => 'required|exists:vendas,id',
        ]);

        $vendaProduto = VendaProduto::create([
            'preco_venda' => $validatedData['preco_venda'],
            'variacao_do_produto_id' => $validatedData['variacao_do_produto_id'],
            'venda_id' => $validatedData['venda_id'],
        ]);

        return response()->json($vendaProduto, 201);
    }

    public function update(Request $request, $id)
    {
        $vendaProduto = VendaProduto::findOrFail($id);

        $validatedData = $request->validate([
            'preco_venda' => 'required|numeric|min:0',
            'variacao_do_produto_id' => 'required|exists:variacao_do_produtos,id',
            'venda_id' => 'required|exists:vendas,id',
        ]);

        $vendaProduto->update([
            'preco_venda' => $validatedData['preco_venda'],
            'variacao_do_produto_id' => $validatedData['variacao_do_produto_id'],
            'venda_id' => $validatedData['venda_id'],
        ]);

        return response()->json($vendaProduto, 200);
    }

    public function destroy($id)
    {
        $vendaProduto = VendaProduto::findOrFail($id);

        $vendaProduto->delete();

        return response()->json(null, 204);
    }    
}