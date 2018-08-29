@extends('layouts.app')

@section('content')    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>
                Listado de menues<a href="{{ route('menues.create') }}" class="btn btn-primary float-right">Nuevo</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            @include('menues.fragment.aside')
        </div>
    </div>
    <div class="row">
        <div class=col-lg-12>
            <br>
                @include('menues.fragment.info')
            <br>

                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Posición</th>
                        <th>Icono</th>
                        <th>Menu</th>
                        <th>Url</th>
                        <th colspan="3">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($menues as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>
                                    @if($menu->file)
                                        <img src="{{ $menu->file }}" class="img-responsive" width="50" height="100">
                                    @endif
                                </td>
                                <td>{{ $menu->pos }}</td>
                                <td>{{ $menu->icologo }}</td>
                                <td>
                                    <strong>{{ $menu->title }}</strong>
                                </td>
                                <td>{{ $menu->url }}</td>
                                <td>
                                    <a href="{{ route('menues.show', $menu->id) }}"  class="btn btn-link">Ver</a>
                                </td>
                                <td>
                                    <a href="{{ route('menues.edit', $menu->id) }}"  class="btn btn-link">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('menues.destroy', $menu->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-link">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $menues->render() !!}
            </div>

        </div>
    </div>
@endsection