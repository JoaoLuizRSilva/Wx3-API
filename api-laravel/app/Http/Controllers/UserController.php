<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'cpf' => 'required|string|unique:users,cpf',
        ]);

        if (!$this->validateCPF($request->cpf)) {
            return response()->json(['error' => 'CPF inválido'], 400);
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'cpf' => $validatedData['cpf'],
        ]);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        return response()->json($user, 200);
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
    
        $user->delete();

        return response()->json(null, 204);
    }

    /**
     * Valida um CPF.
     *
     * @param string $cpf O CPF a ser validado
     * @return bool True se o CPF for válido, false caso contrário
     */
    private function validateCPF($cpf)
    {
        // Remove caracteres não numéricos do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula os dígitos verificadores
        for ($i = 9; $i < 11; $i++) {
            $sum = 0;
            for ($j = 0; $j < $i; $j++) {
                $sum += $cpf[$j] * (($i + 1) - $j);
            }
            $remainder = $sum % 11;
            $digit = ($remainder < 2) ? 0 : 11 - $remainder;
            if ($cpf[$i] != $digit) {
                return false;
            }
        }

        return true;
    }
}