@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing"></div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Resgate de Prêmio</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: auto;">
                    <form action="" method="POST">

                        <input type="hidden" value="{{ Request::url() }}" id="url_resgate">
                        <input type="hidden" id="perfil" value="{{ Auth::user()->perfil }}">
                        <input type="hidden" id="email" value="{{ Auth::user()->email }}">
                        <div class="form-row mb-1">
                            <div class="form-group col-md-12">
                                <label for="pontuacao">Pontuação a Resgatar</label>
                                <input name="pontuacao" type="text" class="form-control" id="pontuacao" placeholder="Mínimo a ser resgatado de 30.000.....Inserir números sem pontuação">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" class="btn btn-primary mt-3" id="enviar-resgate-pontos">Resgatar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing"></div>
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