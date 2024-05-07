<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\VariacaoDoProduto;

class VendaController extends Controller
{
    public function store(Request $request){
        $requestData = $request->all();

        $valorTotal = $this->calcularValorTotal($requestData);
        $venda = Venda::create([
            'valor_total' => $valorTotal,
            'valor_frete' => 10, // Valor fixo do frete
            'forma_pagamento' => $requestData['forma_pagamento'],
            'data_venda' => now(),
            'variacao_do_produto_id' => $requestData['variacao_do_produto_id'],
            'endereco_id' => $requestData['endereco_id'],
            'cliente_id' => $requestData['cliente_id'],
        ]);

        return response()->json($venda, 201);
    }

    private function calcularValorTotal($dados){
        $valorTotal = 0;
        // Adicionando o valor fixo do frete
        $valorTotal += 10; 

        // Pregando o preço de venda da variação do produto
        $variacaoProduto = VariacaoDoProduto::findOrFail($dados['variacao_do_produto_id']);
        $precoVenda = $variacaoProduto->preco_venda;

        $valorTotal += $precoVenda;

        if ($dados['forma_pagamento'] === 'pix') {
            $valorTotal *= 0.9; // Desconto de 10% no pix
        }

        return $valorTotal;
    }
}