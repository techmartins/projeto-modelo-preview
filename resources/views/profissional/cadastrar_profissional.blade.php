@extends('layouts.app')

@section('content')


  <div class="layout-px-spacing">

    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">                                
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Novo Profissional</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area" style="height: auto;">
            <form action="{{ route('profissional.store') }}" method="POST">

              <input type="hidden" value="{{ route('profissional.store') }}" id="url_cadastro">
              <input type="hidden" value="{{ Request::url() }}" id="url_visualizar">
              <input type="hidden" value="profissional" id="perfil">
              <div class="form-row mb-1">
                <div class="form-group col-md-6">
                  <label for="parceiro">Nome</label>
                  <input name="parceiro" type="text" class="form-control" id="parceiro" placeholder="Nome do Profissional">
                </div>
                <div class="form-group col-md-6">
                  <label for="cpf">CPF</label>
                  <input name="cpf" type="text" class="form-control" id="cpf" placeholder="cpf do profissional">
                </div>
                <div class="form-group col-md-3">
                  <label for="email">Email</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="Email do profissional">
                </div>
                <div class="form-group col-md-3">
                  <label for="nascimento">Data de nascimento</label>
                  <input name="nascimento" type="text" class="form-control" id="nascimento" placeholder="Data de nascimento do profissional">
                </div>
                <div class="form-group col-md-3">
                  <label for="telefone">Telefone</label>
                  <input type="tel" class="form-control" id="telefone">
                </div>
                <div class="form-group col-md-3">
                  <label for="area">Área de Atuação</label>
                  <input name="area" type="text" class="form-control" id="area">
                </div>
                <div class="form-group col-md-3">
                  <label for="chave_pix">Chave PIX</label>
                  <input name="chave_pix" type="text" class="form-control" id="chave_pix" placeholder="Chave PIX">
                </div>
                <div class="form-group col-md-3">
                  <label for="cep">CEP</label>
                  <input name="cep" type="text" class="form-control" id="cep">
                  <span id="mensagem"></span>
                </div>
                <div class="form-group col-md-6">
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
                  <label for="password">Senha</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group col-md-3">
                  <button type="button" class="btn btn-primary mt-3" id="enviar-dados">Confirmar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      

      {{-- TABELA DE PROFISSIONAIS --}}
      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <table id="tabela-profissionais" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Parceiro</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Área de Atuação</th>
                    <th>Telefone</th>
                    <th>Chave PIX</th>
                    <th>Criado em</th>
                    {{-- <th>Ação</th> --}}
                  </tr>
              </thead>
              <tbody>
                @foreach ($profissionais as $prof)
                  <tr>
                    <td>{{ $prof->id }}</td>
                    <td>{{ $prof->parceiro }}</td>
                    <td>{{ $prof->cpf }}</td>
                    <td>{{ $prof->email }}</td>
                    <td>{{ $prof->area_atuacao }}</td>
                    <td>{{ $prof->telefone }}</td>
                    <td>{{ $prof->chave_pix }}</td>
                    <td>{{ $prof->created_at }}</td>
                    {{-- <td class="text-center">
                      <button class="btn btn-primary mb-2 btn-editar-profissional" data-id="{{ $prof->id }}"><i data-feather="edit-3"></i></button>
                      <button class="btn btn-danger mb-2 btn-excluir-profissional" data-id="{{ $prof->id }}"><i data-feather="trash-2"></i><span class="icon-name"></span></button>
                    </td> --}}
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- EDITAR OU DELETAR REGISTROS --}}
      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="max-width: 50%">
        <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <div class="form-row mb-1" style="margin-right: 0px;">
              <div class="col-md-4">
                <label for="id-label">Insira aqui o ID do Profissional:</label>
              </div>
              <div class="col-md-4">
                <input name="id_input" type="text" class="form-control" id="id_input">
              </div>
              <div class="col-md-4" style="padding-top: 3px">
                <button class="btn btn-warning btn-editar-profissional"><i data-feather="edit-3"></i></button>
                <button class="btn btn-danger btn-excluir-profissional"><i data-feather="trash-2"></i></button>
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

      {{-- MODAL DE EDITAR PROFISSIONAL --}}

      ​<div class="modal fade" id="modal-editar-profissional" role="dialog">
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
                          <h4>Editar Profissional</h4>
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
                            <label for="password_edit">Senha</label>
                            <input type="password" class="form-control" id="password_edit" placeholder="Password">
                          </div>
                          <button type="button" class="btn btn-primary mt-3" id="editar-dados">Confirmar</button>
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

      <div class="modal fade" id="modal-excluir-profissional" role="dialog">
        <div class="modal-dialog" style="max-width: 30%;">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row layout-top-spacing">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                    <div class="statbox widget box box-shadow">
                      <div class="widget-content widget-content-area" style="height: auto;">
                        <h3>Você tem certeza de que deseja excluir este profissional?</h3>
                        <input type="hidden" id="id_deletar_profissional">
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
