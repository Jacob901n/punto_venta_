@extends('layout.principal')
@section('titulo', 'Productos')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('productos.create') }}" class="btn btn-success mb-2">Agregar</a>
            {{-- @include("notificacion") --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio venta</th>
                        <th>Existencia</th>

                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->precio_venta }}</td>
                            <td>{{ $producto->existencia }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('productos.edit', [$producto]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('productos.destroy', [$producto]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
