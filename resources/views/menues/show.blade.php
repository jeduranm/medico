@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row"> 
            <div class=col-lg-8>
                <img src="{{ $menu->file }}" alt="">
                <p>
                    {{ $menu->pos }}
                </p>                
                <p>
                    {{ $menu->icologo }}
                </p>
                <h2>
                    {{ $menu->title }}
                    <a href="{{ route('menues.edit', $menu->id) }}" class="btn btn-primary float-right">Editar</a>
                </h2>
                <p>
                    {{ $menu->url }}
                </p>
            </div>
            <div class="col-sm-4">
                @include('menues.fragment.aside')
            </div>
        </div>
    </div>
@endsection