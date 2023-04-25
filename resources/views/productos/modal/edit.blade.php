<div class="modal fade" id="editar_producto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop_1Label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdrop_1Label">
                    <p class="titel-2">Producto</p>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_producto" class="form-inline">
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
                        <input required autocomplete="off" name="existencia" class="form-control" type="text" placeholder="Cantidad de producto existente" value="{{$producto->existencia}}">
                    </div>

                    <button class="btn btn-success">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn boton-1" id="btn_guardar_dimensiones">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    const create = document.querySelector("#urg_modal");
    create.addEventListener("click", (e) => {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: route("urg.create"),
            dataType: "html",
            success: function(resp_success) {
                var modal = resp_success;
                $(modal)
                    .modal()
                    .on("shown.bs.modal", function() {
                        $("[class='make-switch']").bootstrapSwitch("animate", true);
                        $(".select2").select2({
                            dropdownParent: $("#add_urg")
                        });
                        $(function() {
                            $("#fecha_adhesion").datepicker({
                                format: "dd-mm-yyyy",
                            });
                        });
                        activarEscuchaCCG();
                    })
                    .on("hidden.bs.modal", function() {
                        $(this).remove();
                    });
            },
            error: function(respuesta) {
                console.log(respuesta);
            },
        });
    });
</script>