@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

<!--  BEGIN NAVBAR  -->
    <div class="header-container" style="background-color: #9fb7e8">
        <header class="header navbar navbar-expand-sm">

            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="/analytics">
                    <img alt="logo" style="margin-right: 15%; height: 90px; width: 110px" src="{{asset('assets/img/logo.png')}}"> 
                    <span class="navbar-brand-name" style="color: #0f046a;">INDICARE - Modelo</span>
                </a>
            </div>

                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1 ml-auto">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <i data-feather="user"></i>
                            <div class="media-body align-self-center">
                                @if (Auth::check())
                                    <h6 style="font-weight: bolder;color: #0f046a;"><span>Olá,</span> {{ Auth::user()->name }}</h6>
                                @endif
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                        <div class="">
                            <!-- @if( Auth::user()->perfil == "profissional" || Auth::user()->perfil == "empresa")
                            <div class="dropdown-item">
                                <a class="" href="/perfil"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Meu Perfil</a>
                            </div>
                            @endif -->
                            <div class="dropdown-item">
                                <a href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sair</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

@endif
