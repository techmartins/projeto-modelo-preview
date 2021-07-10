@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Registrar Compra</h4>
                        </div>
                    </div>
                </div>
            <div class="widget-content widget-content-area" style="height: auto;">
                <form action="{{ route('compras.store') }}" method="POST">

                    <input type="hidden" value="{{ Request::url() }}" id="url_cadastro_compra">
                    <input type="hidden" value="{{ Auth::user()->email }}" id="identificador">
                    <input type="hidden" value="{{ Auth::user()->id }}" id="id_usuario">
                    <div class="form-row mb-1">
                        <div class="form-group col-md-3">
                            <label for="data_compra">Data da Compra</label>
                            <input name="data_compra" type="date" class="form-control" id="data_compra">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cliente">Cliente</label>
                            <input name="cliente" type="text" class="form-control" id="cliente">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor">Valor</label>
                            <input name="valor" type="text" class="form-control" id="valor">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="empresa">Empresa</label>
                            <select name="empresa" id="empresa" class="form-control">
                                <option selected="selected" value="0">Selecione</option>
                                @foreach ($empresas as $emp)
                                <option value="{{$emp->id."/".$emp->razao_social}}">{{$emp->razao_social}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="anotacao">Observação</label>
                            <input name="anotacao" type="text" class="form-control" id="anotacao" placeholder="Anotação Geral">
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-primary mt-3" id="enviar-dados-compra">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>

    </div>
        {{-- LOADING --}}
    ​   <div class="modal fade" id="modal-loading" role="dialog">
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

@endsection
