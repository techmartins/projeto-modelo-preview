<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExemploController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $empresas = Empresa::where('deleted_at', '=', null)->get();
        $page_name = 'cadastrar-indicador';
        $category_name = 'indicador';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('indicador.cadastro_indicador',compact('page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    public function indexindicados()
    {
        $page_name = 'cadastrar-indicados';
        $category_name = 'indicados';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('indicados.cadastro_indicados',compact('page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
