@extends('layouts.app')
@section('content')
    <h3>carros</h3>
    <div class="col-sm-3">
        <a class="btn btn-success" href="{{url('carros/create')}}">Criar</a>
    </div>
    <hr>
    <table class="table table-secondary table-striped">
        <tr class="table-dark">
            <td>#</td>
            <td>modelo</td>
            <td>tipo</td>
        </tr>
        @foreach($carros as $carro)
            <tr>
                <td><a href="carros/{{$carro->id}}">{{$carro->id}}</a></td>
                <td>{{$carro->modelo}}</td>
                <td>{{$carro->tipo}}</td>
            </tr>
        @endforeach
    </table>
@endsection