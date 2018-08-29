@extends('layouts.app')
<br><br>
@section('content') 
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class=col-lg-8>
                <h2>
                    Nueva menu
                        <a href="{{ route('menues.index') }}" class="btn btn-primary float-right">Listado</a>
                </h2>
                <br>
                
                @include('menues.fragment.error')
                
                {!! Form::open(['route' => 'menues.store', 'files' => true]) !!}
                        @include('menues.fragment.form')
                {!! Form::close() !!}         
            </div>

            <div class="col-sm-4">
                @include('menues.fragment.aside')
            </div>
        </div>
    </div>     
@endsection