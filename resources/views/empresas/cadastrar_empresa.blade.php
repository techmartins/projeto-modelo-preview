@extends('layouts.app')

@section('content')


  <div class="layout-px-spacing">

    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">                                
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Nova Empresa</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area" style="height: auto;">
            <form action="{{ route('empresa.store') }}" method="POST">

              <input type="hidden" value="{{ route('empresa.store') }}" id="url_cadastro">
              <input type="hidden" value="{{ Request::url() }}" id="url_visualizar">
              <div class="form-row mb-1">
                <div class="form-group col-md-6">
                  <label for="razao_social">Razão Social</label>
                  <input name="razao_social" type="text" class="form-control" id="razao_social" placeholder="Razão Social da Empresa">
                </div>
                <div class="form-group col-md-6">
                  <label for="cnpj">CNPJ</label>
                  <input name="cnpj" type="text" class="form-control" id="cnpj" placeholder="CNPJ da Empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="email">Email</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="Email da empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="ramo">Ramo de Atividade</label>
                  <select name="ramo" id="ramo" class="form-control">
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
                  <input name="cep" type="text" class="form-control" id="cep">
                  <span id="mensagem"></span>
                </div>
                <div class="form-group col-md-3">
                  <label for="endereco">Endereço</label>
                  <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço">
                </div>
                <div class="form-group col-md-3">
                  <label for="bairro">Bairro</label>
                  <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Bairro">
                </div>
                <div class="form-group col-md-3">
                  <label for="uf">UF</label>
                  <input name="uf" type="text" class="form-control" id="uf" placeholder="Estado">
                </div>
                <div class="form-group col-md-3">
                  <label for="cidade">Cidade</label>
                  <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Cidade">
                </div>
                <div class="form-group col-md-3">
                  <label for="contato">Contato</label>
                  <input type="tel" class="form-control" id="contato">
                </div>
                <div class="form-group col-md-3">
                  <label for="referencia">Referência do Contato</label>
                  <input type="text" class="form-control" id="referencia">
                </div>
                <div class="form-group col-md-3">
                  <label for="password">Senha</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                </div>
                <button type="button" class="btn btn-primary mt-3" id="enviar-dados">Confirmar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      
      {{-- TABELA DE EMPRESAS --}}
      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <table id="tabela-empresas" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Razao Social</th>
                    <th>CNPJ</th>
                    <th>E-mail</th>
                    <th>Atividade</th>
                    <th>Contato</th>
                    <th>Referência</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($empresas as $emp)
                  <tr>
                    <td>{{ $emp->id }}</td>
                    <td>{{ $emp->razao_social }}</td>
                    <td>{{ $emp->cnpj }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>{{ $emp->ramo_atividade }}</td>
                    <td>{{ $emp->contato }}</td>
                    <td>{{ $emp->referencia }}</td>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- EDITAR OU DELETAR REGISTROS --}}
      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="max-width: 45%">
        <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <div class="form-row mb-1" style="margin-right: 0px;">
              <div class="col-md-4">
                <label for="id-label">Insira aqui o ID da Empresa:</label>
              </div>
              <div class="col-md-4">
                <input name="id_input" type="text" class="form-control" id="id_input">
              </div>
              <div class="col-md-4" style="padding-top: 3px">
                <button class="btn btn-warning btn-editar-empresa"><i data-feather="edit-3"></i></button>
                <button class="btn btn-danger btn-excluir-empresa"><i data-feather="trash-2"></i></button>
              </div>
            </div>
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

      {{-- MODAL DE EDITAR EMPRESA --}}

      ​<div class="modal fade" id="modal-editar-empresa" role="dialog">
        <div class="modal-dialog" style="max-width: 65%;">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
              <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                  <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                      <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                          <h4>Editar Empresa</h4>
                        </div>
                      </div>
                    </div>
                    <div class="widget-content widget-content-area" style="height: auto;">
                        
                      <form action="" method="PUT">
                        @csrf
                        <input type="hidden" value="{{Request::url()}}" id="url_cadastro">
                        <input type="hidden" id="email_verified">
                        <input type="hidden" id="id_edit">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- MODAL DE AVISO AO EXCLUIR ALGUM DADO --}}

      <div class="modal fade" id="modal-excluir-empresa" role="dialog">
        <div class="modal-dialog" style="max-width: 30%;">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row layout-top-spacing">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                    <div class="statbox widget box box-shadow">
                      <div class="widget-content widget-content-area" style="height: auto;">
                        <h4>Você tem certeza de que deseja excluir esta empresa?</h4>
                        <input type="hidden" id="id_deletar_empresa">
                        <button type="button" class="btn btn-danger" id="deletar">Excluir</button>
                        <a data-dismiss="modal" style="text-decoration: none; cursor: pointer;">Fechar</a>
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
  </div>

@endsection
