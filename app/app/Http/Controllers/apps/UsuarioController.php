<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller {
    
    public function formularioRegistro() {
        return view('apps.datos');
    }

    public function buscar(Request $request) {
        $input = $request->json()->all();
        if (empty($input)) {
            $input = $request->all();
        }
    
        $query = DB::table('usuarios')->select('*');
        //$query = DB::table('usuarios')->select('id', 'nombre', 'departamento', 'puesto', 'email', 'area', 'campus', 'extension');
    
        if (!empty($input['search'])) {
            $query->where(function ($subquery) use ($input) {
                $subquery->whereRaw('LOWER(nombre) LIKE ?', ['%' . strtolower($input['search']) . '%']);
            });
        }
    
        if (!empty($input['campus'])) {
            $query->whereRaw('LOWER(campus) = ?', [strtolower($input['campus'])]);
        }
    
        if (!empty($input['departamento'])) {
            $query->whereRaw('LOWER(departamento) LIKE ?', ['%' . strtolower($input['departamento']) . '%']);
        }
    
        if (!empty($input['puesto'])) {
            $query->whereRaw('LOWER(puesto) LIKE ?', ['%' . strtolower($input['puesto']) . '%']);
        }
    
        try {
            $result = $query->get()->toArray();
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json([]);
        }
    }

    public function obtenerTodos() {
        $result = DB::table('usuarios')->get()->toArray();
        return response()->json($result);
    }
}