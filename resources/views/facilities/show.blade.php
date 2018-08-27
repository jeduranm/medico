@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row"> 
            <div class=col-lg-8>
                <img src="{{ $facility->file }}" alt="">
                <h2>
                    {{ $facility->title }}
                    <a href="{{ route('facilities.edit', $facility->id) }}" class="btn btn-primary float-right">Editar</a>
                </h2>
                <p>
                </p>
            </div>
            <div class="col-sm-4">
                @include('facilities.fragment.aside')
            </div>
        </div>
    </div>
@endsection