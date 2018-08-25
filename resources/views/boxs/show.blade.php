@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row"> 
            <div class=col-lg-8>
                <img src="{{ $box->file }}" alt="">
                <h2>
                    {{ $box->title }}
                    <a href="" class="btn btn-primary float-right">Editar</a>
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