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
	return View::make('inicio');
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

Route::get('test', function()
{
	return View::make('nosotros.test');
});


Route::get('login', function(){
	return View::make('login');
});

Route::get('Registrar', function(){
	return View::make('nosotros.registrar');
});

Route::get('login', function(){
	return View::make('usuario.login');
});

Route::post('candidato/save', array('uses' => 'CandidatosController@save'));

Route::get('Perfil/{username}', 'CandidatosController@viewPerfil');

Route::group(array('prefix' => 'perfil'), function () {
	Route::post('update/datoscuenta/{id}','CandidatosController@updatedatoscuenta');
	Route::post('update/datospersonales/{id}','CandidatosController@updatedatospersonales');	
	Route::post('update/expectativa/{id}','CandidatosController@updateexpectativa');
	Route::post('update/experiencia/{iduser}/{idexper}','CandidatosController@updateexperiencia');
	Route::post('update/academica/{iduser}/{idacade}','CandidatosController@updateacademica');
	Route::post('update/otros/{id}','CandidatosController@updateotros');	

	Route::post('update/avatar/{id}','CandidatosController@updateavatar');

	Route::post('login', 'CandidatosController@login');


	Route::get('logout', 'CandidatosController@getLogout');
});

/*
	roles
	0->admin
	1->empleado
	2->empresas
	3->candidato
*/
 Route::group(array('prefix' => 'administrador'), function () {
	Route::get('/', function(){
		$users = User::all();
		return View::make('admin.admin')->with('usuarios', $users);
	});

	Route::get('usuariosadmin/update/{id}', array('uses' => 'UsuariosAdminController@viewUpdate'));
	Route::get('usuariosadmin/delete/{id}', array('uses' => 'UsuariosAdminController@delete'));
	Route::post('usuariosadmin/save', array('uses' => 'UsuariosAdminController@save'));
	Route::post('usuariosadmin/update/{id}', array('uses' => 'UsuariosAdminController@update'));
});

 /*
Route::get('insert', function(){
	$user = new User();
	$userdato = new UsuarioDato();
	$userhab = new UsuarioHabilidad();
	$userhab2 = new UsuarioHabilidad();

	$user->username = 'norwingc';
	$user->password = '12345';
	$user->role = 0;
	

	$userdato->nombres = 'Norwin Scott';
	$userdato->apellidos = 'Guerrero Cruz';
	$userdato->fecha_nacimiento = 'fecha';
	
	$userhab->base_datos = "mysql";
	$userhab->programas_diseno = "corel";

	$userhab2->base_datos = "sql";
	$userhab2->programas_diseno = "photo";



	$user->save();
	$user->usuariodato()->save($userdato);
	$user->usuariohabilidad()->save($userhab);
	$user->usuariohabilidad()->save($userhab2);


	return 'bien';
});

Route::get('ver',function(){
	$user = User::find(1);
	$aux = "";

	$datos = $user->usuariodato;
	$hab = $user->usuariohabilidad;

	foreach ($hab as $value) {
		echo $value->base_datos;
		echo $value->id .'<br>';
	}
*/	