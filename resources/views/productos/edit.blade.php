@extends("layout.principal")
@section("titulo", "Editar producto")
@section("contenido")
<div class="row">
    <div class="col-12">
        <form method="POST" action="{{route('productos.update', [$producto])}}">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label class="label">Nombre</label>
                <input required autocomplete="off" name="nombre" class="form-control" type="text" placeholder="Nombre" value="{{$producto->nombre}}">
            </div>
            <div class="form-group">
                <label class="label">Precio de venta</label>
                <input required autocomplete="off" name="precio_venta" class="form-control" type="number" min="0" placeholder="0" value="{{$producto->precio_venta}}">
            </div>
            <div class="form-group">
                <label class="label">Cantidad existente</label>
                <input required autocomplete="off" name="existencia" class="form-control" type="number" placeholder="Cantidad de producto existente" value="{{$producto->existencia}}">
            </div>

            <div class="form-group">
                @if(Session::has('mensaje'))
                <div class="alert alert-success">{{Session::get('mensaje')}}</div>
                @endif
            </div>
            <button class="btn btn-success">Actualizar</button>
            <a class="btn btn-secondary" href="{{route('productos.index')}}">Atras</a>
        </form>
    </div>
</div>
@endsection