<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PageControler extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function inicio(){
        $notas = App\Nota::paginate(5);
        return view('welcome', compact('notas'));    
    }

    public function detalle($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }

    public function crear(Request $formData){
        $formData->validate(
            [
                'nombre' => 'required',
                'descripcion' => 'required'
            ]
        );
        $nuevaNota = New App\Nota;
        $nuevaNota->nombre = $formData->nombre;
        $nuevaNota->descripcion = $formData->descripcion;

        $nuevaNota->save();
        
        return back()->with('msj','Nota Creada!');
    }

    public function editar($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    public function update(Request $formData, $id){
        $nota = App\Nota::findOrFail($id);
        $nota->nombre = $formData->nombre;
        $nota->descripcion = $formData->descripcion;

        $nota->save();

        return back()->with('msj','Nota Editada!');
    }

    public function eliminar($id){
        $notaElimina = App\Nota::findOrFail($id);
        $notaElimina->delete();

        return back()->with('msj', 'Nota Eliminada!');
    }

    public function GetNosotros($nombre = ''){
        $equipo = ['Juan', 'Carlos', 'Diego', 'Andrea'];
        return view('nosotros', compact('equipo', 'nombre'));    
    }
}
