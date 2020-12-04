<?php
namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
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

    public function store(SeriesFormRequest $request)
    {
        $nome = $request->nome;
        $series = Serie::create([
            'nome' => $nome
        ]);

        $request->session()->flash('mensagem', "$nome adicionada com sucesso.");

        return redirect()->route('get_series');
    }

    public function destroy(Request $request)
    {
        $id = filter_var($request->id, FILTER_SANITIZE_NUMBER_INT);

        $serie = Serie::query()->where('id', $id)->first();

        Serie::destroy($id);
        $request->session()->flash('mensagem', "{$serie->nome} foi deletada com sucesso.");

        return redirect()->route('get_series');

    }
}
