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
        $libros = Libros::all();
        return view('libros.leer', compact('libros'));
    }

    public function update(Request $request, Libros $libro){
        
        $request->validate([
            'nombre'=>'required|string|max:225',
            'descripcion'=>'required|string',
            'autor'=>'required|string|max:225',
        ]);

        $libro->update($request->all());

        return redirect()->back()->with('success', 'Libro actualizado con exito');
    }

    public function destroy($id)
    {
        $libro = Libros::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.leer')->with('success', 'Libro eliminado correctamente.');
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

        return redirect()->route('libros.leer')->with('success', 'Libro creado con exito');
    }

}
