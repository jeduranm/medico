@extends('layouts.app')
<br><br>
@section('content') 
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class=col-lg-8>
                <h2>
                    Nuevo medico
                        <a href="{{ route('medicos.index') }}" class="btn btn-primary float-right">Listado</a>
                </h2>
                <br>
                
                @include('medicos.fragment.error')
                
                {!! Form::open(['route' => 'medicos.store', 'files' => true]) !!}
                        @include('medicos.fragment.form')
                {!! Form::close() !!}         
            </div>

            <div class="col-sm-4">
                @include('medicos.fragment.aside')
            </div>
        </div>
    </div>     
@endsection