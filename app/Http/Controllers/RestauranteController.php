<?php
  
    namespace App\Http\Controllers;
    use App\Models\Restaurante;  
    use Illuminate\Http\Request;  
class RestauranteController extends Controller
{
    public function index()
    {
        return Restaurante::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(['nome' => 'required|string|max:255']);
        $restaurante = Restaurante::create($validatedData);
        return response()->json($restaurante, 201);
    }

    public function show($id)
    {
        return Restaurante::with('pratos')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(['nome' => 'required|string|max:255']);
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->update($validatedData);
        return response()->json($restaurante, 200);
    }

    public function destroy($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->delete();
        return response()->json(null, 204);
    }
}
