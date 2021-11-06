@extends('base')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-5" >LISTADO DE CRIPTOMONEDAS </h2>
                <a type="button " href="{{ url('/crear')}}" class="btn btn-success btn-lg active mb-4 col-2 float-right ">AGREGAR </a>

                <table class="table table-hover table-dark ">
                  <thead>
                    <tr>

                        <th class="border px-4 py-2 text-center">LOGOTIPO</th>
                        <th class="border px-4 py-2 text-center">NOMBRE</th>
                        <th class="border px-4 py-2 text-center">PRECIO</th>
                        <th class="border px-4 py-2 text-center">DESCRIPCION</th>
                        <th class="border px-4 py-2 text-center">OPCIONES</th>



                    </tr>
                  </thead>
                  <tbody>

                    @foreach($criptomoneda as $criptomoneda)
                        <tr>

                            <td>
                                <img src="/imagen/{{$criptomoneda->logotipo}}" width="60%">
                            </td>
                            <td>{{$criptomoneda->nombre}}</td>
                            <td>{{$criptomoneda->precio}}</td>
                            <td>{{$criptomoneda->descripcion}}</td>
                            <td class=" border px-4 py-2">
                                <div class="flex justify-center rounded-lg text-lg" role="group">
                                    <!-- opcion para editar, boton-->
                                    <a href="{{ url('/editar', $criptomoneda->id)}}" >
                                        <i class="far fa-edit btn btn-outline-success mr-3 mb-2"></i>
                                    </a>

                                    <!-- opcion para eliminar o borrar, boton-->
                                    <form action="{{route('delete', $criptomoneda->id)}}" method="post">
                                        @csrf @method('DELETE')

                                        <button type="submit" onclick="return confirm('Eliminar Registro de Usuario');" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </button>


                                    </form>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                  </tbody>

                </table>
                {{ $criptomoneda->links() }}
            </div>

        </div>
    </div>
@endsection
