@extends('layouts.app')
<br><br>
@section('content') 
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class=col-lg-8>
                <h2>
                    Nuevo partner
                        <a href="{{ route('partners.index') }}" class="btn btn-primary float-right">Listado</a>
                </h2>
                <br>
                
                @include('partners.fragment.error')
                
                {!! Form::open(['route' => 'partners.store', 'files' => true]) !!}
                        @include('partners.fragment.form')
                {!! Form::close() !!}         
            </div>

            <div class="col-sm-4">
                @include('partners.fragment.aside')
            </div>
        </div>
    </div>     
@endsection