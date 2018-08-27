@extends('layouts.app')
<br><br>
@section('content') 
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h2>
                    Editar instalaciones
                        <a href="{{ route('facilities.index') }}" class="btn btn-primary float-right">Listado</a>
                </h2>
                <br>

                 @include('facilities.fragment.error')
                
                 {!! Form::model($facility, ['route' => ['facilities.update', $facility->id], 'method' => 'POST', 'files' => true ]) !!}
                     @method('PUT')
                     @csrf
                     @include('facilities.fragment.form')
                 {!! Form::close() !!}
            </div>

            <div class="col-sm-4">
                @include('facilities.fragment.aside')
            </div>
        </div>
    </div>    
@endsection