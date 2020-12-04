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
        <div class="form-group">
            <label for="name">Nome da Série:</label>
            <input type="text" id="name" name="nome" class="form-control w-100">
        </div>

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
