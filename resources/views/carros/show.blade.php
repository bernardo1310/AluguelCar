@extends('layouts.app')
@section('content')
    <h2>{{$carro->modelo}}</h2>
    <ul>
        <li>tipo: {{$carro->tipo}}</li>
    </ul>
    @if(Auth::check() && Auth::user()->isAdmin())
    {{Form::open(['route'=>['carros.destroy',$carro->id],'method'=>'DELETE'])}}
                
        <a class="btn btn-warning" href="{{$carro->id}}/edit">Editar</a>
        
        {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}

    {{Form::close()}}
    @endif  
@endsection