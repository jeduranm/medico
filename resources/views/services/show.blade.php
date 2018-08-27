@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row"> 
            <div class=col-lg-8>
                <img src="{{ $service->file }}" alt="">
                <h2>
                    {{ $service->title }}
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary float-right">Editar</a>
                </h2>
                <p>
                    {{ $service->description }}
                </p>
            </div>
            <div class="col-sm-4">
                @include('services.fragment.aside')
            </div>
        </div>
    </div>
@endsection