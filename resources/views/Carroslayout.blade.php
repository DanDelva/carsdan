<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modelo @yield('title') </title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/Carros/index.js'])
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand">Modelo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('carros')}}">listado</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('carros/create')}}">Crear</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('marcas')}}">Marca</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container mt-3">
        @yield('body')
      </div>

</body>
</html>