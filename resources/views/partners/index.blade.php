@extends('layouts.app')

@section('content')    
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>
                Listado de partners<a href="{{ route('partners.create') }}" class="btn btn-primary float-right">Nuevo</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            @include('partners.fragment.aside')
        </div>
    </div>
    <div class="row">
        <div class=col-lg-12>
            <br>
                @include('partners.fragment.info')
            <br>

                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Partner</th>
                        <th colspan="3">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($partners as $partner)
                            <tr>
                                <td>{{ $partner->id }}</td>
                                <td>
                                    @if($partner->file)
                                        <img src="{{ $partner->file }}" class="img-responsive" width="50" height="100">
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $partner->title }}</strong>
                                </td>
                                <td>
                                    <a href="{{ route('partners.show', $partner->id) }}"  class="btn btn-link">Ver</a>
                                </td>
                                <td>
                                    <a href="{{ route('partners.edit', $partner->id) }}"  class="btn btn-link">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('partners.destroy', $partner->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-link">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $partners->render() !!}
            </div>

        </div>
    </div>
@endsection