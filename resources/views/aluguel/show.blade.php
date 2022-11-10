@extends('layouts.app')
@section('content')
    <h2>{{$alug->id}}</h2>
    <ul>
        <li>carro: {{$alug->carro}}</li>
        <li>contato: {{$alug->contato}}</li>
    </ul>
    @if(Auth::check() && Auth::user()->isAdmin())
    {{Form::open(['route'=>['aluguel.destroy',$alug->id],'method'=>'DELETE'])}}
                
        <a class="btn btn-warning" href="{{$alug->id}}/edit">Editar</a>
        
        {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}

    {{Form::close()}}
    @endif  
@endsection