@extends('layout.principal')
@section('titulo', 'Productos')
@section('contenido')
<div class="row">
    <div class="col-12">
        <a href="{{ route('productos.create') }}" class="btn btn-success mb-2">Agregar</a>
        <div class="form-group">
            @if(Session::has('mensaje'))
            <div class="alert alert-success">{{Session::get('mensaje')}}</div>
            @endif
        </div>
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
                        <a class="btn btn-warning" href="{{ route('productos.edit', [$producto->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('productos.destroy', [$producto->id]) }}" method="post">
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
@section('js')
<!-- @routes('productos') -->
<script type="text/javascript">
    function abrirModalEditar() {
        console.log("Siiiiiiiii")
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: route("productos.edit", 1),
            dataType: "html",
            success: function(resp_success) {
                var modal = resp_success;
                $(modal)
                    .modal()
                    .on("shown.bs.modal", function() {
                        $("[class='make-switch']").bootstrapSwitch("animate", true);
                        $(".select2").select2({
                            dropdownParent: $("#editar_producto")
                        });
                    })
                    .on("hidden.bs.modal", function() {
                        $(this).remove();
                    });
            },
            error: function(respuesta) {
                console.log(respuesta);
            },
        });
    }
</script>
@endsection