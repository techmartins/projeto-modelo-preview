<?php

namespace App\Http\Controllers;

use App\Profissionais;
use App\Empresa;
use App\User;
use App\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'perfil';
        $category_name = 'perfil';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('perfil.perfil',compact('page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('profissional.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->perfil == "profissional"){
            $profissional = Profissionais::where('email', '=', $request->email)->get();
            $retorno = response()->json($profissional);
        }

        if($request->perfil == "empresa"){
            $empresa = Empresa::where('email', '=', $request->email)->get();
            $retorno = response()->json($empresa);
        }

        return $retorno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Profissionais $profissional)
    {
        //return view('profissional.edit',compact('profissional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profissionais $profissional, Empresa $empresa)
    {
        
        if($request->perfil == "profissional"){

            $personagem = Profissionais::where([
                ['email', '=', $request->email_verified],
                ['deleted_at', '=', null]
            ])->get();
            
            $newUser['name'] = $request->parceiro;
            $newUser['password'] = Hash::make($request->password);
            $newUser['email'] = $request->email;
            
            $usuario = User::where('id', $request->id)->update($newUser);

            unset($request['email_verified']);
            unset($request['id']);
    
            $profissional->where('email', $personagem[0]->email)->where('deleted_at', null)->update($request->toArray());

            $retorno = response()->json($profissional);

            dd($profissional);

            $log['entidade'] = "perfil_profissional";
            $log['acao'] = "editar_perfil";
            $log['observacao'] = "Perfil de ". $request->parceiro ." editado";
            $log['id_usuario'] = $request->id;
            
            Logbook::create($log);
        
        }

        if($request->perfil == "empresa"){

            $personagem = Empresa::where([
                ['email', '=', $request->email_verified],
                ['deleted_at', '=', null]
            ])->get();
            
            $newUser['name'] = $request->razao_social;
            $newUser['password'] = Hash::make($request->password);
            $newUser['email'] = $request->email;
    
            $usuario = User::where('id', $request->id)->update($newUser);

            unset($request['email_verified']);
            unset($request['id']);
    
            $empresa->where('email', $request->email_verified)->where('deleted_at', null)->update($request->toArray());
    
            $retorno = response()->json($empresa);

            $log['entidade'] = "perfil_empresa";
            $log['acao'] = "editar_perfil";
            $log['observacao'] = "Perfil de ". $request->razao_social ." editado";
            $log['id_usuario'] = $request->id;
            
            Logbook::create($log);
        
        }

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
        // Profissionais::where('id', '=', $request->id)->update(['deleted_at' => now()]);

        // return response()->json("success", 200);
    }

}
