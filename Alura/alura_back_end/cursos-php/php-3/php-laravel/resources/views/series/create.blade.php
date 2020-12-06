@extends('layout')

@section('titleDocument')
Adicionar Nova Série
@endsection

@section('title')
Adicionar Série
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST">
    @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome da Série:</label>
                <input type="text" id="nome" name="nome" class="form-control w-100">
            </div>
            <div class="col col-2">
                <label for="temporadas">N° de Temp:</label>
                <input type="number" id="temporadas" name="temporadas" class="form-control w-100">
            </div>
            <div class="col col-2">
                <label for="episodios">N° de eps por Temp:</label>
                <input type="number" id="episodios" name="episodios" class="form-control w-100">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
