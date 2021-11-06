@extends('base')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-5" > CRIPTOMONEDAS </h2>
                <a type="button " href="{{ url('/crear')}}" class="btn btn-success btn-lg btn-block">AGREGAR NUEVA CRIPTOMONEDA AL LISTADO</a>
                <table class="table table-hover table-dark ">
                    <tr>

                        <th>LOGOTIPO</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>DESCRIPCION</th>



                    </tr>


                </table>
            </div>

        </div>
    </div>
@endsection
