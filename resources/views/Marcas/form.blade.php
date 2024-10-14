@extends ( ' layout' )
@section('title')
- @yield('formName')
@endsection
@section ('body' )
@if($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <p><b><i class="fa-solid fa-times"></i> Errores </b></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">@yield('formName')</div>
                <div class="card-body">
                    <form @yield('action') method="POST">
                        @yield('method')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-wand-magic-sparkles"></i></span>
                            <input type="text" name="marca" class="form-control" placeholder="Marca" 
                            @isset($marca) value="{{$marca->marca}}" @required(true) @endisset required>
                        </div>
                        <button class="btn btn-success" type="submit"> Guardar </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection