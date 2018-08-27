@extends('layouts.app')
<br><br>
@section('content') 
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h2>
                    Editar medicos
                        <a href="{{ route('medicos.index') }}" class="btn btn-primary float-right">Listado</a>
                </h2>
                <br>

                 @include('medicos.fragment.error')
                
                 {!! Form::model($medico, ['route' => ['medicos.update', $medico->id], 'method' => 'POST', 'files' => true ]) !!}
                     @method('PUT')
                     @csrf
                     @include('medicos.fragment.form')
                 {!! Form::close() !!}
            </div>

            <div class="col-sm-4">
                @include('medicos.fragment.aside')
            </div>
        </div>
    </div>    
@endsection