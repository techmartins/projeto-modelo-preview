<?php

namespace App\Http\Controllers;

use App\Pontuacao;
use App\Profissionais;
use App\Empresa;
use App\User;
use Illuminate\Http\Request;

class PontuacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pontuacao = Pontuacao::all();
        $pontuacao = $pontuacao->sortBy('pontuacao');
        $page_name = 'pontuacao';
        $category_name = 'pontuacao';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('pontuacao.visualizar_pontuacao',compact('pontuacao', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    public function indexTabela()
    {
        $profissionais = Profissionais::select('parceiro', 'pontuacao')
            ->where('deleted_at', null)
            ->orderBy('pontuacao', 'desc')
            //->skip(10)->take(3)
            ->get();
        
        $page_name = 'ranking';
        $category_name = 'ranking';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('ranking.visualizar_ranking',compact('profissionais', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pontuacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pontuacao',
            'premio'
        ]);
        
        Pontuacao::create($request->all());

        return redirect()->route('pontuacao')
                        ->with('success','Pontuação adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pontuacao = Pontuacao::where('id', '=', $request->id)->get();
        $retorno = response()->json($pontuacao);

        return $retorno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Pontuacao $pontuacao)
    {
        return view('pontuacao.edit',compact('pontuacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pontuacao $pontuacao)
    {
        $request->validate([
            'pontuacao',
            'premio'
        ]);

        $pontuacao->where('id', '=', $request->id)->update($request->toArray());

        $retorno = response()->json($pontuacao);

        return $retorno;
        // return redirect()->route('empresa')
        //                 ->with('success','Empresa atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $vendas = Vendas::where('id', '=', $request->id)->update(['deleted_at' => now()]);

        // return response()->json($vendas, 200);
    }

}