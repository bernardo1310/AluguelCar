@extends('layouts.app')
@section('content')
    <h2 style="color: white;">Novo contato</h2>
    {{Form::open(['route'=>'contatos.store','method'=>'POST','enctype'=>'multipart/form-data'])}}
        nome;
        {{Form::text('nome','',['class'=>'form-control','required'])}}
        telefone;
        {{Form::text('telefone','',['class'=>'form-control','required'])}}
        foto:
        {{Form::file('foto',['class'=>'form-control'])}}
        <hr>

        {{Form::submit('enviar',['class'=>'btn btn-success'])}}

        {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
        'class' => 'btn btn-danger'])}}

    {{Form::close()}}
@endsection