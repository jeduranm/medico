@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row"> 
            <div class=col-lg-8>
                <img src="{{ $box->file }}" alt="">
                <p>
                    {{ $box->icologo }}
                </p>
                <h2>
                    {{ $box->title }}
                    <a href="{{ route('boxs.edit', $box->id) }}" class="btn btn-primary float-right">Editar</a>
                </h2>
                <p>
                    {{ $box->description }}
                </p>
            </div>
            <div class="col-sm-4">
                @include('boxs.fragment.aside')
            </div>
        </div>
    </div>
@endsection