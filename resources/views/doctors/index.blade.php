@extends('layouts.app')

@section('content')    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>
                Listado de doctores<a href="{{ route('doctors.create') }}" class="btn btn-primary float-right">Nuevo</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            @include('doctors.fragment.aside')
        </div>
    </div>
    <div class="row">
        <div class=col-lg-12>
            <br>
                @include('doctors.fragment.info')
            <br>

                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Box</th>
                        <th>Descripción Corta</th>
                        <th colspan="3">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>
                                    @if($doctor->file)
                                        <img src="{{ $doctor->file }}" class="img-responsive" width="50" height="100">
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $doctor->title }}</strong>
                                </td>
                                <td>{{ $doctor->description }}</td>
                                <td>
                                    <a href="{{ route('doctors.show', $doctor->id) }}"  class="btn btn-link">Ver</a>
                                </td>
                                <td>
                                    <a href="{{ route('doctors.edit', $doctor->id) }}"  class="btn btn-link">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-link">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $doctors->render() !!}
            </div>

        </div>
    </div>
@endsection