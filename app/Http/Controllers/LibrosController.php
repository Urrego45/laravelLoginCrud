<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;

class LibrosController extends Controller
{
    public function crear(){
        return view('libros.crear');
    }

    public function leer(){
        $libros = Libros::all()
        return view('libros.leer', compact('libros'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre'=>'required|string|max:225',
            'descripcion'=>'required|string',
            'autor'=>'required|string|max:225',
        ]);

        $libro = new Libros();
        $libro->nombre = $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->autor = $request->autor;

        $libro->save();

        return redirect()->back()->with('success', 'Libro creado con exito');
    }

}
