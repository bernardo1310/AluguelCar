@extends('layouts.app')
@section('content')
    <h2>novo contato</h2>
    {{Form::open(['route'=>['contatos.update',$contato->id],'method'=>'PUT'])}}
        nome:
        {{Form::text('nome',$contato->nome,['class'=>'form-control','required'])}}
        telefone;
        {{Form::text('telefone',$contato->telefone,['class'=>'form-control','required'])}}

        {{Form::submit('enviar',['class'=>'btn btn-success'])}}

        {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
        'class' => 'btn btn-danger'])}}

    {{Form::close()}}
@endsection