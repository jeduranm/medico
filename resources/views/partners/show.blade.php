@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row"> 
            <div class=col-lg-8>
                <img src="{{ $partner->file }}" alt="">
                <h2>
                    {{ $partner->title }}
                    <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary float-right">Editar</a>
                </h2>
                <p>
                </p>
            </div>
            <div class="col-sm-4">
                @include('partners.fragment.aside')
            </div>
        </div>
    </div>
@endsection