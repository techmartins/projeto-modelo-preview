@extends('layouts.app')

@section('content')

            <div class="layout-px-spacing">

                <div class="row layout-spacing">

                    <!-- Content -->
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 layout-top-spacing"></div>
                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                        <div class="bio layout-spacing ">
                            <div class="widget-content widget-content-area">
                                @if( Auth::user()->perfil == "profissional")
                                    <form action="" method="PUT">
                                        @csrf
                                        <input type="hidden" value="{{ Request::url() }}" id="url_cadastro">
                                        <input type="hidden" value="{{ Auth::user()->id }}" id="id">
                                        <input type="hidden" value="{{ Auth::user()->perfil }}" id="perfil">
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-6">
                                                <label for="parceiro_edit">Nome</label>
                                                <input name="parceiro_edit" type="text" class="form-control" id="parceiro_edit" placeholder="Nome do Profissional">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="cpf_edit">CPF</label>
                                                <input name="cpf_edit" type="text" class="form-control" id="cpf_edit" placeholder="cpf do profissional">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="email_edit">Email</label>
                                                <input name="email_edit" type="email" class="form-control" id="email_edit" placeholder="Email do profissional">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nascimento_edit">Data de nascimento</label>
                                                <input name="nascimento_edit" type="text" class="form-control" id="nascimento_edit" placeholder="Data de nascimento do profissional">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="telefone_edit">Telefone</label>
                                                <input type="tel" class="form-control" id="telefone_edit">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="area_edit">Área de Atuação</label>
                                                <input name="area_edit" type="text" class="form-control" id="area_edit">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="chave_pix_edit">Chave PIX</label>
                                                <input name="chave_pix_edit" type="text" class="form-control" id="chave_pix_edit" placeholder="Chave PIX">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cep_edit">CEP</label>
                                                <input name="cep_edit" type="text" class="form-control" id="cep_edit">
                                                <span id="mensagem"></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="endereco_edit">Endereço</label>
                                                <input name="endereco_edit" type="text" class="form-control" id="endereco_edit" placeholder="Endereço">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="bairro_edit">Bairro</label>
                                                <input name="bairro_edit" type="text" class="form-control" id="bairro_edit" placeholder="Bairro">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="uf_edit">UF</label>
                                                <input name="uf_edit" type="text" class="form-control" id="uf_edit" placeholder="Estado">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cidade_edit">Cidade</label>
                                                <input name="cidade_edit" type="text" class="form-control" id="cidade_edit" placeholder="Cidade">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="password_edit">Redefinir Senha</label>
                                                <input type="password" class="form-control" id="password_edit" placeholder="Password">
                                            </div>
                                            <button type="button" class="btn btn-primary mt-3" id="editar-dados">Confirmar</button>
                                        </div>
                                    </form>
                                @endif

                                @if( Auth::user()->perfil == "empresa")
                                <form action="" method="PUT">
                                    @csrf
                                    <input type="hidden" value="{{Request::url()}}" id="url_cadastro">
                                    <input type="hidden" id="id_edit">
                                    <input type="hidden" value="{{ Auth::user()->id }}" id="id">
                                    <input type="hidden" value="{{ Auth::user()->perfil }}" id="perfil">
                                    <div class="form-row mb-1">
                                        <div class="form-group col-md-6">
                                            <label for="razao_social">Razão Social</label>
                                            <input name="razao_social" type="text" class="form-control" id="razao_social_edit" placeholder="Razão Social da Empresa">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cnpj">CNPJ</label>
                                            <input name="cnpj" type="text" class="form-control" id="cnpj_edit" placeholder="CNPJ da Empresa">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="email">Email</label>
                                            <input name="email" type="email" class="form-control" id="email_edit" placeholder="Email da empresa">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="ramo">Ramo de Atividade</label>
                                            <select name="ramo" id="ramo_edit" class="form-control">
                                            <option selected="">Selecione</option>
                                            <option value="Ar Condicionado">Ar Condicionado</option>
                                            <option value="Automacao Residencial">Automação Residencial</option>
                                            <option value="Coifas e Calhas">Coifas, Calhas</option>
                                            <option value="Cortinas e Persianas">Cortinas e Persianas</option>
                                            <option value="Drywall e Gesso">Drywall e Gesso</option>
                                            <option value="Energia Fotovoltaica">Energia Fotovoltaica</option>
                                            <option value="Esquadrias e PVC">Esquadrias e PVC</option>
                                            <option value="Lajes e Artefatos Cimento">Lajes e Artefatos Cimento</option>
                                            <option value="Marcenaria">Marcenaria</option>
                                            <option value="Materiais de Construcao">Materiais de Construção</option>
                                            <option value="Moveis e Decoracao">Móveis e Decoração</option>
                                            <option value="Moveis Planejados">Móveis Planejados</option>
                                            <option value="Moveis Prontos">Móveis Prontos</option>
                                            <option value="Pergolado Madeira">Pergolado Madeira</option>
                                            <option value="Vidracaria">Vidraçaria</option>
                                            <option value="Vidros Box e Guarda Corpo">Vidros Box e Guarda Corpo</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cep">CEP</label>
                                            <input name="cep" type="text" class="form-control" id="cep_edit">
                                            <span id="mensagem"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="endereco">Endereço</label>
                                            <input name="endereco" type="text" class="form-control" id="endereco_edit" placeholder="Endereço">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="bairro">Bairro</label>
                                            <input name="bairro" type="text" class="form-control" id="bairro_edit" placeholder="Bairro">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="uf">UF</label>
                                            <input name="uf" type="text" class="form-control" id="uf_edit" placeholder="Estado">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cidade">Cidade</label>
                                            <input name="cidade" type="text" class="form-control" id="cidade_edit" placeholder="Cidade">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="contato">Contato</label>
                                            <input type="tel" class="form-control" id="contato_edit">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="referencia">Referência do Contato</label>
                                            <input type="text" class="form-control" id="referencia_edit">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="password">Senha</label>
                                            <input type="password" class="form-control" id="password_edit" placeholder="Password">
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                        <button type="button" class="btn btn-primary mt-3" data-dismiss="modal" id="editar-dados">Confirmar</button>
                                        </div>
                                    </form>
                                @endif

                            </div>                                
                        </div>

                    </div>

                    {{-- LOADING --}}
                    ​<div class="modal fade" id="modal-loading" role="dialog">
                        <div class="modal-dialog" style="max-width: 20%;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                            <div class="row layout-top-spacing">
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="max-width: 20%;">
                                <div class="widget-content widget-content-area br-6">
                                    <div class="col-md-12">
                                    <div class="loader dual-loader mx-auto"></div>
                                    <h2 style="text-align: center">Processando...</h2>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
            
@endsection