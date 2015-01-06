<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$vacantes = Vacante::all();
	return View::make('inicio')->with('vacantes', $vacantes);
});

Route::get('Nosotros', function()
{
	return View::make('nosotros.nosotros');
});

Route::get('Contactenos', function()
{
	return View::make('nosotros.contacto');
});

Route::get('MasServicios', function()
{
	return View::make('nosotros.masservicios');
});
Route::get('Evaluacion', function()
{
	return View::make('nosotros.evaluacion');
});

Route::get('MasEmpleos', function()
{	
	$vacantes = Vacante::paginate(2);	;
	return View::make('nosotros.masempleos')->with('vacantes', $vacantes);
});

Route::get('Reclutamiento', function(){
	return View::make('nosotros.reclutamiento');
});

Route::post('save/empresas', 'EmpresasController@save');

Route::get('Registrar', function(){
	return View::make('nosotros.registrar');
});

Route::get('login', function(){
	return View::make('usuario.login');
});
Route::post('perfil/login', 'CandidatosController@login');
Route::post('perfil/rememberpass', 'CandidatosController@rememberpass');

Route::get('recuperar/contraseña', function(){
	return View::make('usuario.remember');
});

Route::post('candidato/save', array('uses' => 'CandidatosController@save'));

Route::get('Perfil/{username}', 'CandidatosController@viewPerfil');

Route::group(array('prefix' => 'perfil', 'before' => 'auth'), function () {
	Route::post('update/datoscuenta/{id}','CandidatosController@updatedatoscuenta');
	Route::post('update/datospersonales/{id}','CandidatosController@updatedatospersonales');	
	Route::post('update/expectativa/{id}','CandidatosController@updateexpectativa');
	Route::post('update/experiencia/{iduser}/{idexper}','CandidatosController@updateexperiencia');
	Route::post('update/academica/{iduser}/{idacade}','CandidatosController@updateacademica');
	Route::post('update/otros/{id}','CandidatosController@updateotros');
	Route::post('update/avatar/{id}','CandidatosController@updateavatar');
	
	Route::get('logout', 'CandidatosController@getLogout');

	Route::post('add/experiencia/{id}','CandidatosController@addexperiencia');
	Route::post('add/educacion/{id}','CandidatosController@addeducacion');
	

	Route::get('cv/{username}', function($username){		
			$user = User::where('username', $username)->first();

			if(Auth::user()->id == $user->id){
				//return View::make('usuario.cv')->with('user', $user);
				$html = View::make("usuario.cv")->with('user', $user);
		    	return PDF::load($html, 'A4', 'portrait')->show();
		    }else{
		    	return Redirect::to('/');
		    }
	});	
	Route::get('vacante/aplicar/{idvacante}/{iduser}', 'VacantesController@aplicarVacante');
});

/*
	roles
	0->admin
	1->empleado
	2->empresas
	3->candidato
*/
Route::group(array('before' => 'auth'), function()
{	
	Route::group(array('prefix' => 'administrador', 'before' => 'roles:0-1,login' ), function () {
		Route::get('/', function(){
			$users = User::all();
			return View::make('admin.admin')->with('usuarios', $users);
		});

		Route::get('usuariosadmin/update/{id}', array('uses' => 'UsuariosAdminController@viewUpdate'));
		Route::get('usuariosadmin/delete/{id}', array('uses' => 'UsuariosAdminController@delete'));
		Route::post('usuariosadmin/save', array('uses' => 'UsuariosAdminController@save'));
		Route::post('usuariosadmin/update/{id}', array('uses' => 'UsuariosAdminController@update'));

		Route::get('empresas', 'EmpresasController@view');
		Route::get('empresas/update/{id}','EmpresasController@viewUpdate');	
		Route::get('empresas/solicitud',function(){
			$empresas = Empresa::all();
			return View::make('admin.empresassolicitud')->with('empresas', $empresas);
		});
		Route::post('empresas/updateadmin/{id}','EmpresasController@updateadmin');	

		Route::get('candidatos', function(){
			$user = User::where('role_id', 3)->get();

			return View::make('admin.candidato')->with('user', $user);
		});


		Route::get('vacantes', function(){
			$vacantes = Vacante::all();
			return View::make('admin.vacantes')->with('vacantes', $vacantes);
		});
		Route::get('vacante/update/{id}', 'VacantesController@viewUpdate');
		Route::post('vacante/save', 'VacantesController@save');
		Route::post('vacante/update/{id}', 'VacantesController@update');
	});
});