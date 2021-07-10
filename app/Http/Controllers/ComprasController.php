<?php

namespace App\Http\Controllers;

use App\Compras;
use App\Vendas;
use App\Profissionais;
use App\Empresa;
use App\Logbook;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::where('deleted_at', '=', null)->latest()->get();
        $empresas = $empresas->sortBy('razao_social');
        $page_name = 'compras';
        $category_name = 'compras';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('compras.registrar_compra',compact('empresas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.create');
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
            'empresa',
            'id_profissional',
            'id_usuario',
            'cliente',
            'valor',
            'anotacao',
            'data_compra'
        ]);

        // empresa -> Nome e ID
        $separador = explode("/",$request->empresa);
        $request['id_empresa'] = $separador[0];
        $request['empresa'] = $separador[1];
        
        //pegar a data da compra
        if($request->data_compra == null){
            $request->data_compra = date('d-m-Y H:i');
        }
        
        $compra = Compras::create($request->all());
        
        $log['entidade'] = "compras";
        $log['acao'] = "registro";
        $log['observacao'] = "Registro de compras de: " . $request['empresa'];
        $log['id_usuario'] = $request->id_usuario;
        
        Logbook::create($log);
        
        return redirect()->action('ComprasController@index')->with('success','Compra registrada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vendas = Vendas::where('id', '=', $request->id)->get();
        $retorno = response()->json($vendas);

        return $retorno;
    }
    
    public function minhascompras(Request $request)
    {
    	$compras = Compras::all();
    	$page_name = 'compras';
        $category_name = 'compras';
        $has_scrollspy = 0;
        $scrollspy_offset = '';
        
        return view('compras.visualizar_minhas_compras',compact('compras', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendas $vendas)
    {
        return view('vendas.edit',compact('vendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendas $vendas)
    {
        $request->validate([
            'valor' => 'required',
            'cliente' => 'required',
            'contato' => 'required',
            'indicador' => 'required',
            'indicado' => 'required',
            'pontuacao_indicador' => 'required',
            'descricao_servico' => 'required',
            'caed' => 'required'
        ]);

        $vendas->where('id', '=', $request->id)->update($request->toArray());

        $retorno = response()->json($vendas);

        return $retorno;
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
