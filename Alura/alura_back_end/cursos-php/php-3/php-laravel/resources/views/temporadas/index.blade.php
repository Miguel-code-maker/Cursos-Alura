@extends('layout');

@section('titleDocument')
    Lista de temporadas
@endsection

@section('title')
    Temporadas de {{ $serie->nome }}
@endsection

@section('content')
    <ul class="list-group w-80 w-auto">
        @foreach ($temporadas as $temporada)
        <li class="list-group-item">{{ $temporada->numero }} Temporada</li>
        @endforeach
    </ul>
@endsection
