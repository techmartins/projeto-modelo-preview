@extends('layouts.app')

@section('content')


  <div class="layout-px-spacing">

    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">                                
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Novo Indicado</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area" style="height: auto;">
            <form action="{{ route('indicador.store') }}" method="POST">

              <div class="form-row mb-1">
                <div class="form-group col-md-6">
                  <label for="nome_completo">Nome Completo</label>
                  <input name="nome_completo" type="text" class="form-control" id="nome_completo" placeholder="Nome Completo">
                </div>
                <div class="form-group col-md-2">
                  <label for="tel">Telefone</label>
                  <input name="tel" type="text" class="form-control" id="tel">
                </div>
                <div class="form-group col-md-2">
                  <label for="indicacao">Indicação</label>
                  <select class="form-control">
                    <option>
                      CLARO
                    </option>
                    <option>
                      VIVO
                    </option>
                    <option>
                      OI
                    </option>
                    <option>
                      PLANO DE SAÚDE
                    </option>
                    <option>
                      SEGURO
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="cep">CEP</label>
                  <input name="cep" type="text" class="form-control" id="cep">
                  <span id="mensagem"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="endereco">Endereço</label>
                  <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço">
                </div>
                <div class="form-group col-md-4">
                  <label for="bairro">Bairro</label>
                  <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Bairro">
                </div>
                <div class="form-group col-md-1">
                  <label for="uf">UF</label>
                  <input name="uf" type="text" class="form-control" id="uf" placeholder="Estado">
                </div>
                <div class="form-group col-md-3">
                  <label for="cidade">Cidade</label>
                  <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Cidade">
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
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Nome</th>
                  <th style="text-align: center;">Telefone</th>
                  <th style="text-align: center;">Indicação</th>
                  <th style="text-align: center;">Ação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td style="text-align: center;">Lucas Martins</td>
                  <td style="text-align: center;">11961238993</td>
                  <td style="text-align: center;">CLARO</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicados"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicados"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td style="text-align: center;">Lucas Martins</td>
                  <td style="text-align: center;">11961238993</td>
                  <td style="text-align: center;">VIVO</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicados"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicados"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td style="text-align: center;">Lucas Martins</td>
                  <td style="text-align: center;">11961238993</td>
                  <td style="text-align: center;">CLARO</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicados"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicados"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td style="text-align: center;">Lucas Martins</td>
                  <td style="text-align: center;">11961238993</td>
                  <td style="text-align: center;">CLARO</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicador"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicador"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td style="text-align: center;">Lucas Martins</td>
                  <td style="text-align: center;">11961238993</td>
                  <td style="text-align: center;">CLARO</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicados"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicados"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
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

      ​<div class="modal fade" id="modal-editar-indicados" role="dialog">
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
                          <h4>Editar Indicados</h4>
                        </div>
                      </div>
                    </div>
                    <div class="widget-content widget-content-area" style="height: auto;">
                        
                      <form action="{{ route('indicador.store') }}" method="POST">
                      @csrf
                        <div class="form-row mb-1">
                          <div class="form-group col-md-6">
                            <label for="nome_completo_edit">Nome Completo</label>
                            <input name="nome_completo_edit" type="text" class="form-control" id="nome_completo_edit" placeholder="Nome Completo">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="tel_edit">Telefone</label>
                            <input name="tel_edit" type="text" class="form-control" id="tel_edit">
                          </div>
                          <div class="form-group col-md-2">
                            <label for="indicacao_edit">Indicação</label>
                            <select class="form-control" id="indicacao">
                              <option>
                                CLARO
                              </option>
                              <option>
                                VIVO
                              </option>
                              <option>
                                OI
                              </option>
                              <option>
                                PLANO DE SAÚDE
                              </option>
                              <option>
                                SEGURO
                              </option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="tel_edit">Telefone</label>
                            <input name="tel_edit" type="text" class="form-control" id="tel_edit">
                          </div>
                          <div class="form-group col-md-6">
                          </div>
                          <button type="button" class="btn btn-primary mt-3" id="editar-dados">Processar</button>
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
                        <h4>Você tem certeza de que deseja excluir este registro?</h4>
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
