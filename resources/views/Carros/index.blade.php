@extends('Carroslayout')
@section('title')
    - Listado de Carros
@endsection
@section('body')
    @if($msj = Session::get('success'))
        <div class="row" id="alerta">
            <div class="col-md-4 offset-md-4">
                <div class="alert alert-success">
                    <p><i class="fa-solid fa-check"></i> {{$msj}}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>MODELO</th>
                            <th>COLOR</th>
                            <th>PRECIO</th>
                            <th>TRANSMISION</th>
                            <th>SUBMARCA</th>
                            <th>MARCA</th>
                            <th>FOTO</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carros as $i => $row)
                            <tr>
                                <td>{{ ($i+1) }}</td>
                                <td>{{ $row->modelo }}</td>
                                <td>{{ $row->color }}</td>
                                <td>{{ $row->precio }}</td>
                                <td>{{ $row->transmision }}</td>
                                <td>{{ $row->submarca }}</td>
                                <td>{{ $row->marca ? $row->marca->marca : 'Sin marca' }}</td>
                                <td>{{ $row->foto }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('carros.edit', $row->id)}}">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form id="frm_{{$row->id}}" method="POST" action="{{route('carros.destroy', $row->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button data-bs-toggle="modal" data-bs-target="#modalConfirmacion" onclick="setInfo({{$row->id}}, '{{$row->modelo}} - {{$row->marca ? $row->marca->marca : 'Sin marca'}}')" type="button" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modalConfirmacion">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">¿Seguro de eliminar?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p><i class="fa-solid fa-warning fs-3 text-warning"></i>
             <label id="lbl_nombre"></label>
            </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" id="btnEliminar" class="btn btn-success">Sí, eliminar</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('js')
    @vite('resources/js/Carros/index.js')
@endsection
