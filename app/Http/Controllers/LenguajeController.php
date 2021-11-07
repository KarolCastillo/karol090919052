<?php

namespace App\Http\Controllers;

use App\Models\Lenguaje;
use Illuminate\Http\Request;

class LenguajeController extends Controller
{
    //Formulario Create Lenguaje
    public function create(){

        return view('programacion.agregar');
    }

    //Guardar Lenguaje
    public function store(Request $request)
    {
        $validation = $this->validate($request, [

            'descripcion_lenguaje' => 'required',
            'definicion'=>'required',

        ]);

        lenguaje::create([

            'descripcion_lenguaje'=>$validation['descripcion_lenguaje'],
            'definicion'=> $validation['definicion'],

        ]);

        return redirect('/lenguaje');




    }

    //Read Listado de lenguajes
    public function index(){
        $language['lenguajes'] = Lenguaje::paginate(7);

        return view('programacion.listar', $language);
    }

    //Formulario para Update lenguajes
    public function edit($id){
        $lenguajes = Lenguaje::findOrFail($id);

        return view('programacion.modificar', compact( 'lenguajes'));
    }

    //Edicion de lenguajes
    public function update(Request $request, $id){
        $dataLeng = request()->except((['_token','_method']));
        Lenguaje::where('id', '=', $id)->update($dataLeng);

        return redirect('/lenguaje');
    }

    //Delete lenguajes
    public function destroy($id){
        Lenguaje::destroy($id);

        return back()->with('eliminar', 'ok');
    }
}
