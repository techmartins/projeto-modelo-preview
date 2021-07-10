@extends('layouts.app')

@section('content')


  <div class="layout-px-spacing">

    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">                                
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Novo Indicador</h4>
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
                  <label for="cpf">CPF</label>
                  <input name="cpf" type="text" class="form-control" id="cpf">
                </div>
                <div class="form-group col-md-2">
                  <label for="pix">Chave PIX</label>
                  <input name="pix" type="text" class="form-control" id="pix">
                </div>
                <div class="form-group col-md-2">
                  <label for="banco">Banco</label>
                  <input name="banco" type="text" class="form-control" id="banco">
                </div>
                <div class="form-group col-md-2">
                  <label for="agencia">Agência</label>
                  <input name="agencia" type="text" class="form-control" id="agencia">
                </div>
                <div class="form-group col-md-2">
                  <label for="conta">Conta</label>
                  <input name="conta" type="text" class="form-control" id="conta">
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
                <div class="form-group col-md-7">
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
                  <th style="text-align: center;">CPF</th>
                  <th style="text-align: center;">Chave PIX</th>
                  <th style="text-align: center;">Banco</th>
                  <th style="text-align: center;">Agencia</th>
                  <th style="text-align: center;">Conta</th>
                  <th style="text-align: center;">Ação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td style="text-align: center;">Lucas Pereira</td>
                  <td style="text-align: center;">376.258.168.18</td>
                  <td style="text-align: center;">12345678910</td>
                  <td style="text-align: center;">Banco Nacional</td>
                  <td style="text-align: center;">1001</td>
                  <td style="text-align: center;">1975612</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicador"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicador"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td style="text-align: center;">Lucas Castilhos</td>
                  <td style="text-align: center;">376.258.168.18</td>
                  <td style="text-align: center;">12345678910</td>
                  <td style="text-align: center;">Banco Nacional</td>
                  <td style="text-align: center;">1001</td>
                  <td style="text-align: center;">1975612</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicador"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicador"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td style="text-align: center;">Lucas Martins</td>
                  <td style="text-align: center;">376.258.168.18</td>
                  <td style="text-align: center;">12345678910</td>
                  <td style="text-align: center;">Banco Nacional</td>
                  <td style="text-align: center;">1001</td>
                  <td style="text-align: center;">1975612</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicador"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicador"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td style="text-align: center;">Lucas Martins</td>
                  <td style="text-align: center;">376.258.168.18</td>
                  <td style="text-align: center;">12345678910</td>
                  <td style="text-align: center;">Banco Nacional</td>
                  <td style="text-align: center;">1001</td>
                  <td style="text-align: center;">1975612</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicador"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicador"><i data-feather="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td style="text-align: center;">Lucas Martins</td>
                  <td style="text-align: center;">376.258.168.18</td>
                  <td style="text-align: center;">12345678910</td>
                  <td style="text-align: center;">Banco Nacional</td>
                  <td style="text-align: center;">1001</td>
                  <td style="text-align: center;">1975612</td>
                  <td style="text-align: center;">
                    <button class="btn btn-primary btn-editar-indicador"><i data-feather="edit-3"></i></button>
                    <button class="btn btn-danger btn-excluir-indicador"><i data-feather="trash-2"></i></button>
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
                          <h4>Editar Indicador</h4>
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
                          <div class="form-group col-md-6">
                            <label for="cpf_edit">CPF</label>
                            <input name="cpf_edit" type="text" class="form-control" id="cpf_edit">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="pix_edit">Chave PIX</label>
                            <input name="pix_edit" type="text" class="form-control" id="pix_edit">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="banco_edit">Banco</label>
                            <input name="banco_edit" type="text" class="form-control" id="banco_edit">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="agencia_edit">Agência</label>
                            <input name="agencia_edit" type="text" class="form-control" id="agencia_edit">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="conta_edit">Conta</label>
                            <input name="conta_edit" type="text" class="form-control" id="conta_edit">
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
                          <div class="form-group col-md-6">
                          </div>
                          <button type="button" class="btn btn-primary mt-3" id="editar-dados">Editar</button>
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
