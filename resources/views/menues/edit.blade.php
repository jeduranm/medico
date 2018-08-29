@extends('layouts.app')
<br><br>
@section('content') 
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h2>
                    Editar menues
                        <a href="{{ route('menues.index') }}" class="btn btn-primary float-right">Listado</a>
                </h2>
                <br>

                 @include('menues.fragment.error')
                
                 {!! Form::model($menu, ['route' => ['menues.update', $menu->id], 'method' => 'POST', 'files' => true ]) !!}
                     @method('PUT')
                     @csrf
                     @include('menues.fragment.form')
                 {!! Form::close() !!}
            </div>

            <div class="col-sm-4">
                @include('menues.fragment.aside')
            </div>
        </div>
    </div>    
@endsection