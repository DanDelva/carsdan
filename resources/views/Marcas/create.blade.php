@extends('Marcas.form')
@section('formName')
    Crear
@endsection
@section('action')
    action = "{{route('marcas.store')}}"
@endsection
