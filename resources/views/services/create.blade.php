@extends('layouts.app')
<br><br>
@section('content') 
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class=col-lg-8>
                <h2>
                    Nuevo servicio
                        <a href="{{ route('services.index') }}" class="btn btn-primary float-right">Listado</a>
                </h2>
                <br>
                
                @include('services.fragment.error')
                
                {!! Form::open(['route' => 'services.store', 'files' => true]) !!}
                        @include('services.fragment.form')
                {!! Form::close() !!}         
            </div>

            <div class="col-sm-4">
                @include('services.fragment.aside')
            </div>
        </div>
    </div>     
@endsection