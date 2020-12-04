@extends('layout')

@section('titleDocument')
    Listar series
@endsection

@section('title')
    Séries
@endsection

@section('content')
    @if (!empty($mensagem))
        <span class="alert alert-success d-block">{{$mensagem}}</span>
    @endif
    <a class="btn btn-dark mb-3" href="{{ route('get_criar_series') }}">Adicionar Séries</a>
    <ul class="list-group w-80 w-auto">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{ $serie->nome }}
            <form action="/series/remover/{{ $serie->id }}" method="POST" onsubmit="return confirm('tem certeza que deseja excluir {{ addslashes($serie->nome) }}')">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
            </form>
        </li>
        @endforeach
    </ul>
@endsection
