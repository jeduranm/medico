@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row"> 
            <div class=col-lg-8>
                <img src="{{ $medico->file }}" alt="">
                <h2>
                    {{ $medico->name }}
                    <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-primary float-right">Editar</a>
                </h2>
                <p>
                    {{ $medico->position }}
                </p>
            </div>
            <div class="col-sm-4">
                @include('medicos.fragment.aside')
            </div>
        </div>
    </div>
@endsection