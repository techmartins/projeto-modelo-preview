@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12"></div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow" style="height: auto; border: none; width: 600px;">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="padding-top: 15px; padding-left: 15px;">
                            <h3>Pontuação</h3>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: auto;">
                    
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                            <input type="hidden" value="{{ Request::url() }}" id="url_visualizar">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pontuação</th>
                                        <th>Premiação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($pontuacao as $pontos)
                                    <tr>
                                        <td>{{ $pontos->id }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-editar-pontuacao" data-id="{{ $pontos->id }}">{{ $pontos->pontuacao }}</button>
                                        </td>
                                        <td>{{ $pontos->premio }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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

                {{-- MODAL DE EDITAR PONTUACAO --}}

                ​<div class="modal fade" id="modal-editar-pontuacao" role="dialog">
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
                                                <h4>Editar Pontuação</h4>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="widget-content widget-content-area" style="height: auto;">
                                                
                                                <form action="" method="PUT">
                                                    @csrf
                                                    <input type="hidden" value="{{Request::url()}}" id="url_cadastro">
                                                    <input type="hidden" id="id">
                                                    <div class="form-row mb-1">
                                                        <div class="form-group col-md-2">
                                                            <label for="pontuacao">Pontuação</label>
                                                            <input name="pontuacao" type="text" class="form-control" id="pontuacao">
                                                        </div>
                                                        <div class="form-group col-md-10">
                                                            <label for="premio">Descrição do Prêmio</label>
                                                            <input type="text" class="form-control" id="premio">
                                                        </div>
                                                        <button type="button" class="btn btn-primary mt-3" data-dismiss="modal" id="editar-dados">Editar</button>
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
        </div>
    </div>
</div>

@endsection