@extends('layouts.app')
@section('content')
    <h3>aluguel</h3>
    <div class="col-sm-3">
        <a class="btn btn-success" href="{{url('aluguel/create')}}">Criar</a>
    </div>
    <hr>
    <table class="table table-secondary table-striped">
        <tr class="table-dark">
            <td>#</td>
            <td>contato</td>
            <td>carro</td>
        </tr>
        @foreach($aluguel as $alug)
            <tr>
                <td><a href="carros/{{$alug->id}}">{{$alug->id}}</a></td>
                <td>{{$alug->contato}}</td>
                <td>{{$alug->carro}}</td>
            </tr>
        @endforeach
    </table>
@endsection