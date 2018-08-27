@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row"> 
            <div class=col-lg-8>
                <img src="{{ $doctor->file }}" alt="">
                <h2>
                    {{ $doctor->title }}
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-primary float-right">Editar</a>
                </h2>
                <p>
                    {{ $doctor->description }}
                </p>
            </div>
            <div class="col-sm-4">
                @include('doctors.fragment.aside')
            </div>
        </div>
    </div>
@endsection