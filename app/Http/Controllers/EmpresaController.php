<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\User;
use App\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::where('deleted_at', '=', null)->get();
        $page_name = 'cadastrar-empresa';
        $category_name = 'empresas';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('empresas.cadastrar_empresa',compact('empresas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
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
            'razao_social',
            'cnpj',
            'email',
            'ramo_atividade',
            'cep',
            'endereco',
            'bairro',
            'uf',
            'cidade',
            'contato',
            'pontuacao',
            'referencia',
            'password'
        ]);
        $validacao = Empresa::where('email', '=', $request->email)->get();

        // if($validacao > 0){
        //     return $msg = ;
        // }

        $empresa = Empresa::create($request->all());

        
        $newUser['name'] = $request->razao_social;
        $newUser['email'] = $request->email;
        $newUser['password'] = Hash::make($request->password);
        $newUser['perfil'] = "empresa";
        
        $usuario = User::create($newUser);
        //dd($usuario);
        
        $retorno = response()->json($empresa);
        
        return $retorno;
        // return redirect()->action('EmpresaController@index')->with('success','Empresa registrada com sucesso.');
        // return redirect()->route('empresa')
        //                 ->with('success','Empresa registrada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $empresa = Empresa::where('id', '=', $request->id)->get();
        $retorno = response()->json($empresa);

        return $retorno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'razao_social' => 'required',
            'cnpj' => 'required',
            'ramo_atividade',
            'email',
            'email_verified',
            'cep',
            'endereco',
            'bairro',
            'uf',
            'cidade',
            'contato',
            'referencia',
            'password'
        ]);

        $newUser['name'] = $request->razao_social;
        $newUser['password'] = Hash::make($request->password);

        $usuario = User::where('email', $request->email_verified)->update($newUser);

        $empresa->where('id', $request->id)->update($request->toArray());
        
        $retorno = response()->json($empresa);

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
        Empresa::where('id', '=', $request->id)->update(['deleted_at' => now()]);

        return response()->json("success", 200);
    }

}
