<?php

use Illuminate\Support\Facades\Route;
use App\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });





Route::group(['middleware' => 'auth'] , function() {

    // $this->middleware

    Route::get('/analytics', function() {
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'analytics';
        return view('dashboard')->with($data);
    });
    
    Route::get('/sales', function() {
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'sales',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'sales';
        return view('dashboard2')->with($data);
    });

    // VISUALIZAÇÃO E EDIÇÃO DO PERFIL
    Route::get('/perfil', 'PerfilController@index');
    Route::get('/perfil/{email}', 'PerfilController@show')->name('perfil.show');
    Route::put('/perfil/{id}', 'PerfilController@update')->name('perfil.update');

    // CRUD EMPRESA
    Route::get('/empresa', 'EmpresaController@index');
    Route::post('/empresa', 'EmpresaController@store')->name('empresa.store');
    Route::get('/empresa/{id}', 'EmpresaController@show')->name('empresa.show');
    Route::get('/empresa/{id}/edit', 'EmpresaController@edit')->name('empresa.edit');
    Route::put('/empresa/{id}', 'EmpresaController@update')->name('empresa.update');
    Route::delete('/empresa/{id}', 'EmpresaController@destroy')->name('empresa.destroy');

    // CRUD PROFISSIONAL
    Route::get('/profissional', 'ProfissionalController@index');
    Route::post('/profissional', 'ProfissionalController@store')->name('profissional.store');
    Route::get('/profissional/{id}', 'ProfissionalController@show')->name('profissional.show');
    Route::get('/profissional/{id}/edit', 'ProfissionalController@edit')->name('profissional.edit');
    Route::put('/profissional/{id}', 'ProfissionalController@update')->name('profissional.update');
    Route::delete('/profissional/{id}', 'ProfissionalController@destroy')->name('profissional.destroy');

    // DADOS DE VENDA E RANKING
    Route::get('/vendas', 'VendasController@index'); // VISUALIZA A TELA DE CADASTRO DAS VENDAS
    Route::get('/vendas/visualizar', 'VendasController@getallvendas')->name('visualizar.vendas'); // VISUALIZA AS VENDAS EM GERAL
    Route::get('/vendas/resgate/premio', 'VendasController@resgatarpremiacao'); // PÁGINA DE RESGATE DO PREMIO
    Route::post('/vendas/resgate/premio', 'VendasController@realizarresgate');
    Route::get('/minhasvendas/', 'VendasController@getvendas');
    Route::get('/analytics/minhapontuacao', 'VendasController@getminhapontuacao');   // RETORNA A PONTUAÇÃO DO USUÁRIO LOGADO
    Route::get('/analytics/minhasvendas', 'VendasController@getminhasvendas');  // RETORNA AS VENDAS DO USUARIO LOGADO
    Route::post('/vendas', 'VendasController@store')->name('vendas.store');   //  CADASTRA VENDA
    
    // COMPRAS
    Route::get('/compras', 'ComprasController@index');   // VISUALIZA TELA DE CADASTRO DE COMPRAS DO PROFISSIONAL
    Route::get('/compras/minhascompras', 'ComprasController@minhascompras'); // VISUALIZAR COMPRAS DO USUARIO PROFISSIONAL LOGADO
    Route::post('/compras', 'ComprasController@store')->name('compras.store');   // CADASTRA COMPRA DO PROFISSIONAL
    
    // CRUD DA TABELA PONTUAÇÃO
    Route::get('/pontuacao', 'PontuacaoController@index');
    Route::get('/tabelaranking', 'PontuacaoController@indexTabela');
    Route::get('/pontuacao/{id}', 'PontuacaoController@show')->name('pontuacao.show');
    Route::put('/pontuacao/{id}', 'PontuacaoController@update')->name('pontuacao.update');

    Route::get('/indicador', 'ExemploController@index');
    Route::post('/indicador', 'ExemploController@store')->name('indicador.store');

    Route::get('/indicados', 'ExemploController@indexindicados');
    Route::post('/indicados', 'ExemploController@cadastrarindicados')->name('indicados.cadastrarindicados');
    
    // Pages
    Route::prefix('pages')->group(function () {
        Route::get('/coming_soon', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'coming_soon',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'coming_soon';
            return view('pages.pages.pages_coming_soon')->with($data);
        });
        Route::get('/contact_us_form', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'contact_us',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'contact_us';
            return view('pages.pages.pages_contact_us')->with($data);
        });
        Route::get('/error_404', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'error404',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'error404';
            return view('pages.pages.pages_error404')->with($data);
        });
        Route::get('/error_500', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'error500',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'error500';
            return view('pages.pages.pages_error500')->with($data);
        });
        Route::get('/error_503', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'error503',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'error503';
            return view('pages.pages.pages_error503')->with($data);
        });
        Route::get('/faq', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'faq',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'faq';
            return view('pages.pages.pages_faq')->with($data);
        });
        Route::get('/faq2', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'faq2',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'faq2';
            return view('pages.pages.pages_faq2')->with($data);
        });
        Route::get('/helpdesk', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'helpdesk',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'helpdesk';
            return view('pages.pages.pages_helpdesk')->with($data);
        });
        Route::get('/maintenence', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'maintenence',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'maintenence';
            return view('pages.pages.pages_maintenence')->with($data);
        });
        Route::get('/privacy_policy', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'privacy',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'privacy';
            return view('pages.pages.pages_privacy')->with($data);
        });
    });

    // Users
    Route::prefix('users')->group(function () {
        Route::get('/account_settings', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'users',
                'page_name' => 'account_settings',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'account_settings';
            return view('pages.users.user_account_setting')->with($data);
        });
        Route::get('/profile', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'users',
                'page_name' => 'profile',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'profile';
            return view('pages.users.user_profile')->with($data);
        });
    });

});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/register', function() {
    return redirect('/login');    
});
Route::get('/password/reset', function() {
    return redirect('/login');    
});

Route::get('/', function() {
    return redirect('/analytics');    
});

