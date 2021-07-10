@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow" style="height: 600px; border: none;">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Lista das Compras</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: auto;">
                    
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="tabela_compras" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">ID</th>
                                            <th style="text-align: center">Empresa</th>
                                            <th style="text-align: center">Cliente</th>
                                            <th style="text-align: center">Valor</th>
                                            <th style="text-align: center">Data da Compra</th>
                                            <th style="text-align: center">Criado em</th>
                                        </tr>
                                        <tr>
                                            <th><input type="text" id="id" placeholder="Pesquisar..."/></th>
                                            <th><input type="text" id="empresa" placeholder="Pesquisar..."/></th>
                                            <th><input type="text" id="cliente" placeholder="Pesquisar..."/></th>
                                            <th><input type="text" id="valor" placeholder="Pesquisar..."/></th>
                                            <th><input type="text" id="data_compra" placeholder="Pesquisar..."/></th>
                                            <th><input type="text" id="created_at" placeholder="Pesquisar..."/></th>
                                        </tr>  
                                    </thead>
                                    <tbody>
                                    @foreach ($compras as $c)
                                    	@if($c->id_profissional == Auth::user()->email)
                                        <tr>
                                            <td style="text-align: center">{{ $c->id }}</td>
                                            <td style="text-align: center">{{ $c->empresa }}</td>
                                            <td style="text-align: center">{{ $c->cliente }}</td>
                                            <td style="text-align: center">{{ $c->valor }}</td>
                                            <td style="text-align: center">{{ $c->data_compra }}</td>
                                            <td style="text-align: center">{{ $c->created_at }}</td>
                                        </tr>
                                       @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
