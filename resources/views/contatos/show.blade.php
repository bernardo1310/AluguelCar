@extends('layouts.app')
@section('content')
    <h2>{{$contato->nome}}</h2>
    <ul>
        <li>telefone; {{$contato->telefone}}</li>
    </ul>
    @php
        $nomeimagem = "";
        if(file_exists("./img/contatos/".md5($contato->id).".jpg")) {
            $nomeimagem = "./img/contatos/".md5($contato->id).".jpg";
        } elseif (file_exists("./img/contatos/".md5($contato->id).".png")) {
            $nomeimagem = "./img/contatos/".md5($contato->id).".png";
        } elseif (file_exists("./img/contatos/".md5($contato->id).".gif")) {
            $nomeimagem =  "./img/contatos/".md5($contato->id).".gif";
        } elseif (file_exists("./img/contatos/".md5($contato->id).".webp")) {
            $nomeimagem = "./img/contatos/".md5($contato->id).".webp";
        } elseif (file_exists("./img/contatos/".md5($contato->id).".jpeg")) {
            $nomeimagem = "./img/contatos/".md5($contato->id).".jpeg";
        } else {
            $nomeimagem = "./img/contatos/semfoto.png";
        }
    @endphp
    <div style="max-width:300px;max-height:300px;border:solid grey 1px;">
        {{Html::image(asset($nomeimagem),'Foto de '.$contato->nome,["class"=>"img-thumbnail w-75 mx-auto d-block"])}}
    </div>
    <br>
    @if(Auth::check() && Auth::user()->isAdmin())
    {{Form::open(['route'=>['contatos.destroy',$contato->id],'method'=>'DELETE'])}}
                
        <a class="btn btn-warning" href="{{$contato->id}}/edit">Editar</a>

        @if ($nomeimagem !== "./img/livros/semfoto.png")
            {{Form::hidden('foto',$nomeimagem)}}
        @endif
        
        {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}

    {{Form::close()}}
    @endif  
    <a class="btn btn-secondary" href="/contatos">Voltar</a>
@endsection