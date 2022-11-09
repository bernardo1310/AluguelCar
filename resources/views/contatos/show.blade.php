@extends('layouts.app')
@section('content')
    <h2>{{$contato->nome}}</h2>
    <ul>
        <li>telefone; {{$contato->telefone}}</li>
    </ul>
    @if(Auth::check() && Auth::user()->isAdmin())
    {{Form::open(['route'=>['contatos.destroy',$contato->id],'method'=>'DELETE'])}}
                
        <a class="btn btn-warning" href="{{$contato->id}}/edit">Editar</a>
        
        {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}

    {{Form::close()}}
    @endif  
    <a class="btn btn-secondary" href="/contatos">Voltar</a>
@endsection