@extends('layouts.app')

@section('content')    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>
                Listado de instalaciones<a href="{{ route('facilities.create') }}" class="btn btn-primary float-right">Nuevo</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            @include('facilities.fragment.aside')
        </div>
    </div>
    <div class="row">
        <div class=col-lg-12>
            <br>
                @include('facilities.fragment.info')
            <br>

                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Instalacion</th>
                        <th colspan="3">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($facilities as $facility)
                            <tr>
                                <td>{{ $facility->id }}</td>
                                <td>
                                    @if($facility->file)
                                        <img src="{{ $facility->file }}" class="img-responsive" width="50" height="100">
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $facility->title }}</strong>
                                </td>
                                <td>
                                    <a href="{{ route('facilities.show', $facility->id) }}"  class="btn btn-link">Ver</a>
                                </td>
                                <td>
                                    <a href="{{ route('facilities.edit', $facility->id) }}"  class="btn btn-link">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('facilities.destroy', $facility->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-link">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $facilities->render() !!}
            </div>

        </div>
    </div>
@endsection