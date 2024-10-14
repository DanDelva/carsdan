@extends('Marcas.form')
@section('formName')
    Editar a <b> {{$marca->marca}} </b>
@endsection
@section('action')
    action = "{{route('marcas.update', $marca)}}"
@endsection
@section('method')
    @method('PUT')
@endsection


