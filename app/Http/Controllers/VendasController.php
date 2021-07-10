<?php

namespace App\Http\Controllers;

use App\Vendas;
use App\Profissionais;
use App\Empresa;
use App\Pontuacao;
use App\Logbook;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissionais = Profissionais::where('deleted_at', '=', null)->latest()->get();
        $profissionais = $profissionais->sortBy('parceiro');
        $empresas = Empresa::where('deleted_at', '=', null)->latest()->get();
        $empresas = $empresas->sortBy('razao_social');
        $page_name = 'vendas';
        $category_name = 'vendas';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('vendas.registrar_venda',compact('profissionais', 'empresas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    public function resgatarpremiacao()
    {
        $page_name = 'resgate';
        $category_name = 'resgate';
        $has_scrollspy = 0;
        $scrollspy_offset = '';
        return view('resgate.resgate',compact('page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    public function realizarresgate(Request $request, Profissionais $profissionais, Empresa $empresa, Pontuacao $pontuacao)
    {
        if($request->perfil == "profissional"){
            $personagem = Profissionais::where([
                ['email', '=', $request->email],
                ['deleted_at', '=', null]
            ])->get();
            
            $premio = Pontuacao::where('pontuacao', '=', $request->pontuacao)->get();
            
            if($premio){
                $premiacao = $premio[0]->premio;
            }

            $resgate = $personagem[0]->pontuacao - $request->pontuacao;
            
            $resultado = Profissionais::where('email', $request->email)
                ->where('deleted_at', null)->update(['pontuacao' => $resgate]);

            $log['entidade'] = $request->perfil;
            $log['acao'] = "resgate";
            $log['observacao'] = "Resgate de " . $request->pontuacao . " para " . $personagem[0]->parceiro . " = Resgate de: " . $premiacao;
            $log['id_usuario'] = $personagem[0]->id;
            
            Logbook::create($log);

        }
        
        if($request->perfil == "empresa"){
            $personagem = Empresa::where([
                ['email', '=', $request->email],
                ['deleted_at', '=', null],
            ])->get();

            $premio = Pontuacao::where('pontuacao', '=', $request->pontuacao)->get();
            
            if($premio){
                $premiacao = $premio[0]->premio;
            }

            $resgate = $personagem[0]->pontuacao - $request->pontuacao;
            $resultado = Empresa::where('email', '=', $request->email)
                ->where('deleted_at', '=', null)->update(['pontuacao' => $resgate]);

            $log['entidade'] = $request->perfil;
            $log['acao'] = "resgate";
            $log['observacao'] = "Resgate de " . $request->pontuacao . " para " . $personagem[0]->razao_social . " = Resgate de: " . $premiacao;
            $log['id_usuario'] = $personagem[0]->id;
            
            Logbook::create($log);
        }

        return $resultado;
    }

    public function getallvendas(Vendas $vendas)
    {
        $vendas = Vendas::all();
        $page_name = 'vendas';
        $category_name = 'vendas';
        $has_scrollspy = 0;
        $scrollspy_offset = '';
        
        return view('vendas.visualizar_vendas',compact('vendas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    public function getminhapontuacao(Request $request)
    {
        if($request->perfil == "empresa"){
            $pontos = Empresa::select('*')->where('email', $request->email)->get();
        }
        if($request->perfil == "profissional"){
            $pontos = Profissionais::select('*')->where('email', $request->email)->get();
        }
        
        if($pontos[0]->pontuacao >= 30000){
            $habilita = "Parabéns você já pode realizar o resgate de pontos, sua pontuação é acima de 30.000! Clique no menu Resgate e adquira já seu prêmio!";
            $retorno['btn_resgate'] = "<button type='button' class='btn btn-success mt-3 btn-resgatar-premio' data-id='".$pontos[0]['id']."' id='btn-resgate'>Resgatar Prêmio</button>";
        }else{
            $habilita = "Infelizmente ainda não há resgate de prêmios disponível, mas não desista, logo poderá resgatá-los!!! Resgate mínimo de 30.000!";
        }
        $retorno['resgate'] = $habilita;
        
        $p = number_format($pontos[0]->pontuacao, 2, ',', '.');
        $p = explode(',',$p);
                
        $retorno['pontuacao'] = response()->json($p[0]);

        return $retorno;
    }

    public function getminhasvendas()
    {
    	$vendas = Vendas::all();
        
        return $vendas;
    }

    public function getvendas(Vendas $vendas)
    {
        $vendas = Vendas::all();
        $page_name = 'vendas';
        $category_name = 'vendas';
        $has_scrollspy = 0;
        $scrollspy_offset = '';
        
        return view('vendas.visualizar_minhas_vendas',compact('vendas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendas.create');
    }

    public function enviaNotificacao($parceiro, $valor, $nova_pontuacao, $empresa, $destinatario)
    {
        $data_envio_email = date('d-m-Y H:i');
        $assunto_email = "Notificação de Pontuação do Club Arq&Design";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ClubArq &Design <osniwellington@gmail.com>';

        $html_email = "<style type='text/css'>
                body {
                margin:0px;
                font-family:Verdane;
                font-size:12px;
                color: #666666;
                }
                a{
                color: #666666;
                text-decoration: none;
                }
                a:hover {
                color: #FF0000;
                text-decoration: none;
                }
                </style>
                <html>
                    <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
                        <tr>
                            <td>
                                <tr>
                                    <td width='500'>Olá, $parceiro</td>
                                </tr>
                                <tr>
                                    <td width='500'>Você foi pontuado em mais $valor pontos, pela empresa $empresa, e poderá acompanhar seus relatórios pelo site: <a href:'http://painel.clubarqedesign.com.br/'>www.clubarqedesign.com.br</a></td>
                                </tr>
                                <tr>
                                    <td width='320'>Club Arq & Design
                                    Construir e decorar, as melhores empresas no mesmo lugar!
                                    (11) 93773-8037</b></td>
                                </tr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sua pontuação atual é: $nova_pontuacao.
                            </td>
                        </tr>
                        <tr>
                            <td>
                                E-mail gerada em $data_envio_email.
                            </td>
                        </tr>
                    </table>
                </html>
            ";
            $destino = $destinatario;
            $enviar_email = mail($destino, $assunto_email, $html_email, $headers);

            if($enviar_email){
                $mgm = "sucesso";
            }else{
                $mgm = "falha";
            }
        
        return $mgm;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Profissionais $profissionais, Empresa $empresa)
    {
        $request->validate([
            'valor',
            'cliente',
            'rt',
            'contato',
            'indicador',
            'indicado',
            'id_indicado',
            'data_venda',
            'descricao_servico',
            'perfil'
        ]);
        
        // valor = pontuacao do usuario
        $valor = $request->valor;
        $request['pontuacao_indicador'] = explode(",", $valor);
        
        $pos = strpos($request['pontuacao_indicador'][0], ".");
        if($pos === false){
            $pt = $request['pontuacao_indicador'][0];
        }else{
            $request['pontuacao_indicador'] = explode(".",$request['pontuacao_indicador'][0]);
            $pt = $request['pontuacao_indicador'][0];
            for ($n = 1; $n < count($request['pontuacao_indicador']); $n++) {
                $pt .= $request['pontuacao_indicador'][$n];
            }
        }
        
        //pegar a data da venda
        if($request->data_venda == null){
            $request->data_venda = date('d-m-Y H:i');
        }
        
        // calculo do CAED%
        if($request->perfil == "profissional-empresa"){
            $request['caed'] = $pt*0.025;
            $request['caed'] = number_format($request['caed'], 2, ',', '.');
            $request['caed'] = str_replace(",", ".", $request['caed']);
            
            $request['indicado'] = $request->indicado;
            $request['id_indicado'] = $request->id_indicado;
            
            $pontos = Profissionais::select('pontuacao' , 'email' , 'parceiro')->where('id', $request['id_indicado'])->where('deleted_at', null)->get();
            
            if($pontos[0]['pontuacao'] !== 0){
                $request_profissional['pontuacao'] = $pontos[0]['pontuacao'] + $pt;
            }else{
                $request_profissional['pontuacao'] = $pt;
            }
            
            $nova_pontuacao = $request_profissional['pontuacao'];
            $request['email_indicado'] = $pontos[0]['email'];

            $this->enviaNotificacao($pontos[0]['parceiro'], $pt, $nova_pontuacao, $request->indicador, $pontos[0]['email']);
            
            $profissionais = Profissionais::where('id', $request['id_indicado'])->where('deleted_at', null)->update($request_profissional);
            
            $log['entidade'] = $request->perfil;
            $log['acao'] = "registro-venda";
            $log['observacao'] = "Registro de Venda para Profissional";
            $log['id_usuario'] = $request['id_indicado'];
            
            Logbook::create($log);
        }else{
            $request['caed'] = $pt*0.05;
            $request['caed'] = number_format($request['caed'], 2, ',', '.');
            $request['caed'] = str_replace(",", ".", $request['caed']);
            
            $request['indicado'] = $request->indicado;
            $request['id_indicado'] = $request->id_indicado;

            $pontos = Empresa::select('pontuacao' , 'email' , 'razao_social')->where('id', $request['id_indicado'])->where('deleted_at', null)->get();

            if($pontos[0]['pontuacao'] !== 0){
                $request_empresa['pontuacao'] = $pontos[0]['pontuacao'] + $pt;
            }else{
                $request_empresa['pontuacao'] = $pt;
            }

            $nova_pontuacao = $request_empresa['pontuacao'];
            $request['email_indicado'] = $pontos[0]['email'];

            $this->enviaNotificacao($pontos[0]['razao_social'], $pt, $nova_pontuacao, $request->indicador, $pontos[0]['email']);
            $empresa = Empresa::where('id', $request['id_indicado'])->where('deleted_at', null)->update($request_empresa);

            $log['entidade'] = $request->perfil;
            $log['acao'] = "registro-venda";
            $log['observacao'] = "Registro de Venda para Empresa";
            $log['id_usuario'] = $request['id_indicado'];
            
            Logbook::create($log);
        }
        
        $request['valor'] = "R$ ".$request->valor;
        $request['pontuacao_indicador'] = $pt;
        $request['perfil'] = $request->perfil;
        $request['indicador'] = $request->indicador;
        
        
        $resultado = Vendas::create($request->all());
        dd($resultado);
        
        $retorno = response()->json($resultado);
        
        return $retorno;
        //return redirect()->action('VendasController@index')->with('success','Empresa registrada com sucesso.');
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

        $log['entidade'] = "venda";
        $log['acao'] = "atualizacao";
        $log['observacao'] = "Atualização de Venda para Empresa";
        $log['id_usuario'] = $request['indicado'];
        
        Logbook::create($log);

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
