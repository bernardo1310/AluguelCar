@extends('layouts.app')
@section('content')
    <h2>novo carro</h2>
    {{Form::open(['route'=>'carros.store','method'=>'POST'])}}
        modelo:
        {{Form::text('modelo','',['class'=>'form-control','required'])}}
        tipo:
        {{Form::text('tipo','',['class'=>'form-control','required'])}}

        {{Form::submit('enviar',['class'=>'btn btn-success'])}}

        {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
        'class' => 'btn btn-danger'])}}

    {{Form::close()}}
@endsection