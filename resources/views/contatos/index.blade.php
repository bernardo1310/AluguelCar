@extends('layouts.app')
@section('content')
    <h1 style="color: white;">Contato</h1>
    {{Form::open(['url'=>'contatos/buscar/ns','method'=>'GET'])}}
        <div class="row">
                @if ((Auth::check()) && (Auth::user()->isAdmin()))
                <div class="col-sm-3">
                    <a class="btn btn-success" href="{{url('contatos/create')}}">Criar</a>
                </div>
                @endif
            <div class="col-sm-9">
                <div class="input-group ml-5">
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('contatos/')}}">Todos</a>&nbsp;
                    @endif
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                    &nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
                </div>
            </div>
        </div>
    {{Form::close()}}
    <hr>
    <table class="table table-secondary table-striped">
        <tr class="table-dark">
            <td>#</td>
            <td>nome</td>
            <td>telefone</td>
        </tr>
        @foreach($contatos as $cont)
            <tr>
                <td><a href="contatos/{{$cont->id}}">{{$cont->id}}</a></td>
                <td>{{$cont->nome}}</td>
                <td>{{$cont->telefone}}</td>
            </tr>
        @endforeach
    </table>
    
@endsection