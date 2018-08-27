@extends('layouts.app')
<br><br>
@section('content') 
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class=col-lg-8>
                <h2>
                    Nuevo doctor
                        <a href="{{ route('doctors.index') }}" class="btn btn-primary float-right">Listado</a>
                </h2>
                <br>
                
                @include('doctors.fragment.error')
                
                {!! Form::open(['route' => 'doctors.store', 'files' => true]) !!}
                        @include('doctors.fragment.form')
                {!! Form::close() !!}         
            </div>

            <div class="col-sm-4">
                @include('doctors.fragment.aside')
            </div>
        </div>
    </div>     
@endsection