<?php
namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\TableWithTemp;
use App\Temporada;
use Illuminate\Http\Request;

class SeriesControllers extends Controller {
    public function index(Request $request) {
        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, TableWithTemp $tableWithTemp)
    {
        $nome = $request->nome;
        $temp = filter_var($request->temporadas, FILTER_SANITIZE_NUMBER_INT);
        $eps = filter_var($request->episodios, FILTER_SANITIZE_NUMBER_INT);

        $serie = $tableWithTemp->create($nome, $temp, $eps, Serie::class);

        $request->session()->flash('mensagem', "$nome adicionada com sucesso.");

        return redirect()->route('get_series');
    }

    public function destroy(Request $request, TableWithTemp $tableWithTemp)
    {
        $id = filter_var($request->id, FILTER_SANITIZE_NUMBER_INT);

        $serie = Serie::query()->where('id', $id)->first();

        //$tableWithTemp->delete(Serie::class, $id);
        Serie::destroy($id);

        $request->session()->flash('mensagem', "{$serie->nome} foi deletada com sucesso.");

        return redirect()->route('get_series');

    }

    public function updateName(Request $request, int $serieId)
    {
        $newName = $request->nome;

        $serie = Serie::find($serieId);

        $serie->nome = $newName;
        $serie->save();

    }
}
