@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Ranking de Pontuação</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: auto;">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover">
                                    <thead>
                                        <tr>
                                            {{-- <th style="text-align: center">Colocação</th> --}}
                                            <th style="text-align: center">Parceiro</th>
                                            <th style="text-align: center">Pontuação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profissionais as $rank)
                                        <tr>
                                            {{-- <td style="text-align: center">{{ $rank->id }}</td> --}}
                                            <td style="text-align: center">{{ $rank['parceiro'] }}</td>
                                            <td style="text-align: center">{{ $rank['pontuacao'] }}</td>
                                        </tr>
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