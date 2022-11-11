@extends('layouts.app')
@section('content')
    {{Form::open(['route'=>['aluguel.update',$alug->id],'method'=>'PUT'])}}

        contato:
        {{Form::text('idContato',$alug->contato->id,['class'=>'form-control','list'=>'listcontato','required'])}}

        carro:
        {{Form::text('idCarro',$alug->carro->id,['class'=>'form-control','list'=>'listcarro','required'])}}

        <datalist id="listcontato">
            @foreach($contatos as $contato)
                <option value="{{$contato->id}}">{{$contato->nome}}</option>
            @endforeach
        </datalist>

        <datalist id="listcarro">
            @foreach($carros as $carro)
                <option value="{{$carro->id}}">{{$carro->modelo}}</option>
            @endforeach
        </datalist>

        {{Form::submit('enviar',['class'=>'btn btn-success'])}}

        {{Form::button('cancelar' ,['onclick' => 'javascript:history.back()',
        'class' => 'btn btn-danger'])}}

    {{Form::close()}}
@endsection