@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN TOPBAR  -->
    <div class="topbar-nav header navbar" role="banner">
        <nav id="topbar" style="background-color: rgb(39, 10, 106)">
            <ul class="list-unstyled menu-categories" id="topAccordion">
                @if(Auth::user()->perfil == "admin")
                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <i data-feather="users"></i>
                            <span>Indicador</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu1" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'cadastrar-indicador') ? 'active' : '' }}">
                            <a href="/indicador"> Cadastro </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->perfil == "empresa")
                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <i data-feather="users"></i>
                            <span>Indicados</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu1" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'cadastrar-indicados') ? 'active' : '' }}">
                            <a href="/indicados"> Cadastro </a>
                        </li>
                    </ul>
                </li>
                @endif
                {{-- @if(Auth::user()->perfil == 'admin')
                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <i data-feather="home"></i>
                            <span>Empresas</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu1" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'cadastrar-empresa') ? 'active' : '' }}">
                            <a href="/public/empresa"> Registrar </a>
                        </li>
                    </ul>
                </li>
                @endif
                

                @if(Auth::user()->perfil == 'empresa' || Auth::user()->perfil == 'admin')
                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <i data-feather="users"></i>
                            <span>Profissionais</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu2" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'cadastrar-profissional') ? 'active' : '' }}">
                            <a href="/public/profissional"> Registrar </a>
                        </li>
                    </ul>
                </li>
                @endif
                
                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            @if(Auth::user()->perfil == 'admin' || Auth::user()->perfil == 'empresa')
                            <span>Vendas</span>
                            @endif
                            @if(Auth::user()->perfil == 'profissional')
                            <span>Compras</span>
                            @endif
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu2" data-parent="#topAccordion">
                        @if(Auth::user()->perfil == 'admin' || Auth::user()->perfil == 'empresa')
                        <li class="{{ ($page_name === 'vendas') ? 'active' : '' }}">
                            <a href="/public/vendas">Registrar Venda</a>
                        </li>
                        @endif
                        @if(Auth::user()->perfil == 'empresa')
                        <li class="{{ ($page_name === 'vendas') ? 'active' : '' }}">
                            <a href="/public/minhasvendas">Minhas Vendas</a>
                        </li>
                        @endif
                        @if(Auth::user()->perfil == 'profissional')
                        <li class="{{ ($page_name === 'compras') ? 'active' : '' }}">
                            <a href="/public/compras">Informar Compra</a>
                        </li>
                        <li class="{{ ($page_name === 'compras') ? 'active' : '' }}">
                            <a href="/public/compras/minhascompras">Minhas Compras</a>
                        </li>
                        @endif
                        @if(Auth::user()->perfil == 'admin')
                        <li class="{{ ($page_name === 'vendas') ? 'active' : '' }}">
                            <a href="/public/vendas/visualizar">Visualizar</a>
                        </li>
                        @endif
                    </ul>
                </li> --}}
                
                {{-- <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <i data-feather="codepen"></i>
                            <span>Obras</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu2" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'vendas') ? 'active' : '' }}">
                            <a href="/public/vendas">Registrar</a>
                        </li>
                        @if(Auth::user()->perfil !== 'admin')
                        <li class="{{ ($page_name === 'vendas') ? 'active' : '' }}">
                            <a href="/public/vendas/visualizar">Minhas Obras</a>
                        </li>
                        @endif
                        <li class="{{ ($page_name === 'vendas') ? 'active' : '' }}">
                            <a href="/public/vendas/visualizar">Lista de Obras</a>
                        </li>
                    </ul>
                </li> --}}

                {{-- @if(Auth::user()->perfil == 'empresa' || Auth::user()->perfil == 'profissional')
                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <i data-feather="users"></i>
                            <span>Resgate</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu2" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'cadastrar-profissional') ? 'active' : '' }}">
                            <a href="/public/vendas/resgate/premio"> Resgatar Premiação </a>
                        </li>
                    </ul>
                </li>
                @endif --}}
                
                {{-- @if(Auth::user()->perfil == 'admin')
                <li class="menu single-menu">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                        <div class="">
                            <i data-feather="printer"></i>
                            <span>Relatórios</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="menu1" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'ranking') ? 'active' : '' }}">
                            <a href="/public/tabelaranking">Ranking</a>
                        </li> --}}
                        {{-- <li>
                            <a href="/relatorios/venda-lojista"> Vendas Por Lojista </a>
                        </li>
                        <li>
                            <a href="/relatorios/obra-profissional"> Obras Por Profissional </a>
                        </li>
                        <li>
                            <a href="/relatorios/comissao-profissional-lojista"> Comissionamento Profissional X Lojista </a>
                        </li> --}}
                        {{-- <li>
                            <a href="/public/pontuacao"> Premiações </a>
                        </li>
                    </ul>
                </li>
                @endif --}}
                
            </ul>
        </nav>
    </div>
    <!--  END TOPBAR  -->

@endif
