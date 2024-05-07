<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    public function store(Request $request){
        $valorTotal = $this->calcularValorTotal($request->all());

        $venda = Venda::create([
            'valor_total' => $valorTotal,
        ]);

        return response()->json($venda, 201);
    }

    private function calcularValorTotal($dados){
        $valorTotal = 0;
        
        $valorTotal += 10; //Adicionando valor fixo do frete

        // Subtraia o desconto, se houver
        if ($dados['forma_pagamento'] === 'pix') {
            $valorTotal *= 0.9;
        }

        return $valorTotal;
    }
}