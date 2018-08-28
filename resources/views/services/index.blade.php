@extends('layouts.app')

@section('content')    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>
                Listado de servicios<a href="{{ route('services.create') }}" class="btn btn-primary float-right">Nuevo</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            @include('services.fragment.aside')
        </div>
    </div>
    <div class="row">
        <div class=col-lg-12>
            <br>
                @include('services.fragment.info')
            <br>

                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Icono</th>
                        <th>Servicio</th>
                        <th>Descripción Corta</th>
                        <th colspan="3">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>
                                    @if($service->file)
                                        <img src="{{ $service->file }}" class="img-responsive" width="50" height="100">
                                    @endif
                                </td>
                                <td>{{ $service->icologo }}</td>
                                <td>
                                    <strong>{{ $service->title }}</strong>
                                </td>
                                <td>{{ $service->description }}</td>
                                <td>
                                    <a href="{{ route('services.show', $service->id) }}"  class="btn btn-link">Ver</a>
                                </td>
                                <td>
                                    <a href="{{ route('services.edit', $service->id) }}"  class="btn btn-link">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-link">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $services->render() !!}
            </div>

        </div>
    </div>
@endsection