<?php
namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Http\Request;

class PratoController extends Controller
    {
        // lista os pratos
        public function index()
        {
            $pratos = Prato::all();
            return response()->json($pratos);
        }
    
        // cria novo prato
        public function store(Request $request)
        {
            // valida os dados
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'ingredientes' => 'required|string',
                'restaurante_id' => 'required|exists:restaurantes,id', 
            ]);
    
            // cria no bd
            $prato = Prato::create($validatedData);
    
            // Retorna o prato 
            return response()->json($prato, 201);
        }
    
        //  exibi um prato específico
        public function show($id)
        {
            $prato = Prato::find($id);
    
            // Verifica se o prato foi encontrado
            if (!$prato) {
                return response()->json(['error' => 'Prato não encontrado'], 404);
            }
    
            return response()->json($prato);
        }
    
        // Método para atualizar um prato específico
        public function update(Request $request, $id)
        {
            // Valida os dados recebidos
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'ingredientes' => 'required|string',
            ]);
    
            $prato = Prato::find($id);
    
            
            if (!$prato) {
                return response()->json(['error' => 'Prato não encontrado'], 404);
            }
    
           
            $prato->update($validatedData);
    
            return response()->json($prato);
        }
    
        // Método para excluir um prato específico
        public function destroy($id)
        {
            $prato = Prato::find($id);
    
            // Verifica se o prato foi encontrado
            if (!$prato) {
                return response()->json(['error' => 'Prato não encontrado'], 404);
            }
    
            // Exclui o prato
            $prato->delete();
    
            return response()->json(['message' => 'Prato excluído com sucesso']);
        }
    }
    