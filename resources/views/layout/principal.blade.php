<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{env('APP_NAME')}}">
    <title>@yield("titulo") - {{env('APP_NAME')}}</title>
    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/css/all.min.css')}}" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            /*Para la barra inferior fija*/
            padding-bottom: 70px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" id="botonMenu" aria-label="Mostrar u ocultar menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <!-- <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('productos.index')}}">Productos&nbsp;<i class="fa fa-box"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Ventas&nbsp;<i class="fa fa-cart-plus"></i></a>
                </li>
            </ul> -->
        </div>
    </nav>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            const menu = document.querySelector("#menu"),
                botonMenu = document.querySelector("#botonMenu");
            if (menu) {
                botonMenu.addEventListener("click", () => menu.classList.toggle("show"));
            }
        });
    </script>
    <main class="container-fluid">
        @yield("contenido")
    </main>
    <footer class="px-2 py-2 fixed-bottom bg-dark">
        <span class="text-muted">
            Punto de venta en Laravel
        </span>
    </footer>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
		const url = "{{ URL::asset('') }}"
	</script>
    @yield('js')

</body>

</html>