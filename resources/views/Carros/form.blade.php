@extends('Carroslayout')
@section('title')
    - @yield('formName')
@endsection
@section('body')
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
                    <form @yield('action') method="POST" enctype="multipart/form-data">
                        @yield('method')
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-car"></i></span>
                            <input type="text" name="modelo" class="form-control" placeholder="Modelo"
                              @isset($carro) value="{{$carro->modelo}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-palette"></i></span>
                            <input type="text" name="color" class="form-control" placeholder="Color"
                              @isset($carro) value="{{$carro->color}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-dollar-sign"></i></span>
                            <input type="number" name="precio" class="form-control" placeholder="Precio"
                              @isset($carro) value="{{$carro->precio}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-cogs"></i></span>
                            <input type="text" name="transmision" class="form-control" placeholder="Transmisión"
                              @isset($carro) value="{{$carro->transmision}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-tag"></i></span>
                            <input type="text" name="submarca" class="form-control" placeholder="Submarca"
                              @isset($carro) value="{{$carro->submarca}}" @endisset required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="fa-solid fa-industry"></i></span>
                            <select name="marca_id" class="form-control" required>
                                <option value="" disabled selected>Seleccione una marca</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}"
                                        @isset($carro)
                                            @if($carro->marca_id == $marca->id) selected @endif
                                        @endisset>
                                        {{ $marca->marca }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="file" name="foto" class="form-control" 
                                   @if(!isset($carro)) required @endif accept="foto/*">
                        </div>
                        <button class="btn btn-success" type="submit"> Guardar </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
