@extends('layouts.app')

@section('content')    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>
                Listado de boxs<a href="{{ route('boxs.create') }}" class="btn btn-primary float-right">Nuevo</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            @include('boxs.fragment.aside')
        </div>
    </div>
    <div class="row">
        <div class=col-lg-12>
            <br>
                @include('boxs.fragment.info')
            <br>

                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Icono</th>
                        <th>Box</th>
                        <th>Descripción Corta</th>
                        <th colspan="3">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($boxs as $box)
                            <tr>
                                <td>{{ $box->id }}</td>
                                <td>
                                    @if($box->file)
                                        <img src="{{ $box->file }}" class="img-responsive" width="50" height="100">
                                    @endif
                                </td>
                                <td>{{ $box->icologo }}</td>
                                <td>
                                    <strong>{{ $box->title }}</strong>
                                </td>
                                <td>{{ $box->description }}</td>
                                <td>
                                    <a href="{{ route('boxs.show', $box->id) }}"  class="btn btn-link">Ver</a>
                                </td>
                                <td>
                                    <a href="{{ route('boxs.edit', $box->id) }}"  class="btn btn-link">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('boxs.destroy', $box->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-link">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $boxs->render() !!}
            </div>

        </div>
    </div>
@endsection