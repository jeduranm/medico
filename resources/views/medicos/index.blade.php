@extends('layouts.app')

@section('content')    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>
                Listado de medicos<a href="{{ route('medicos.create') }}" class="btn btn-primary float-right">Nuevo</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            @include('medicos.fragment.aside')
        </div>
    </div>
    <div class="row">
        <div class=col-lg-12>
            <br>
                @include('medicos.fragment.info')
            <br>

                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Doctor</th>
                        <th>Especialidad</th>
                        <th colspan="3">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($medicos as $medico)
                            <tr>
                                <td>{{ $medico->id }}</td>
                                <td>
                                    @if($medico->file)
                                        <img src="{{ $medico->file }}" class="img-responsive" width="50" height="100">
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $medico->name }}</strong>
                                </td>
                                <td>{{ $medico->position }}</td>
                                <td>
                                    <a href="{{ route('medicos.show', $medico->id) }}"  class="btn btn-link">Ver</a>
                                </td>
                                <td>
                                    <a href="{{ route('medicos.edit', $medico->id) }}"  class="btn btn-link">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-link">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $medicos->render() !!}
            </div>

        </div>
    </div>
@endsection