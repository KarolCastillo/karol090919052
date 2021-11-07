<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\criptomoneda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CriptomonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $criptomonedas = DB::table('criptomoneda')

            ->paginate(5);


        return view('archivo.index', compact('criptomonedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivo.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

              $validation = $this->validate($request, [
                'logotipo' => 'required',
                'nombre' => 'required|string|max:75',
                'precio' => 'required',
                'descripcion'=>'required|string|max:255',
//                'lenguaje' => 'required'
            ]);
        if($request->hasFile('imagen')){
            $validation['logotipo'] = $request-> file('imagen')->store('imagen','public');
        }
//         $criptomoneda =$request->all();
//            if($logotipo =$request->file('logotipo')){
//                $rutaGuardarImg= 'imagen/';
//                $imagenlogotipo=date('YmdHis')."." .$logotipo->getClientOriginalExtension();
//                $logotipo->move($rutaGuardarImg,$imagenlogotipo);
//                $logotipo['imagen'] = "$imagenlogotipo";
//            }

                 criptomoneda::create([
                'logotipo'=>$validation['logotipo'],
                'nombre'=>$validation['nombre'],
                'precio'=>$validation['precio'],
                'descripcion'=> $validation['descripcion'],
//               'lenguaje_id'=> $validation['lenguaje'],
   ]);

        return redirect('/')->with('editar', 'ok');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cript = criptomoneda::findOrFail($id);
        return view('archivo.editar', compact('cript'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $datacriptomoneda = request()->except((['_token','_method']));

        /*Recolecion de logotipo*/
        if($request->hasFile('imagen')){
            $cript = criptomoneda::findOrFail($id);
            Storage::delete('public/'.$cript->logotipo);
            $criptomoneda ['logotipo'] = $request-> file('imagen')->store('imagen','public');
        }

        criptomoneda::where('id', '=', $id)->update($datacriptomoneda);

        return redirect('/')->with('editar', 'ok');
    }

//$validation = $this->validate($request, [
//            'logotipo' => 'required',
//            'nombre' => 'required|string|max:75',
//            'precio' => 'required',
//            'descripcion'=>'required|string|max:255',
////                'lenguaje' => 'required'
//        ]);
//
//
//
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $criptomoneda = criptomoneda::findOrFail($id);

        $criptomoneda->delete();


        return back()->with('criptomonedaEliminado', 'Criptomoneda eliminada');
    }
}
