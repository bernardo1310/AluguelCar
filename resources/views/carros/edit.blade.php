@extends('layouts.app')
@section('content')
    <h2>editar carro</h2>
    {{Form::open(['route'=>['carros.update',$carro->id],'method'=>'PUT'])}}
        modelo:
        {{Form::text('modelo',$carro->modelo,['class'=>'form-control','required'])}}
        tipo:
        {{Form::text('tipo',$carro->tipo,['class'=>'form-control','required'])}}

        {{Form::submit('enviar',['class'=>'btn btn-success'])}}

        {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
        'class' => 'btn btn-danger'])}}

    {{Form::close()}}
@endsection