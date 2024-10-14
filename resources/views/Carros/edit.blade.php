@extends('Carros.form')
@section('formName')
    Editar a <b> {{$carro->modelo}} </b>
@endsection
@section('action')
    action = "{{route('carros.update', $carro)}}"
@endsection
@section('method')
    @method('PUT')
@endsection
