<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * relacion uno a uno	
	 */
	public function usuarioadmin(){
		return $this->hasOne('UsuarioAdmin', 'usuario_id');
	}

	public function usuariodato(){
		return $this->hasOne('UsuarioDato', 'usuario_id');
	}

	/**
	 * relacion uno a mucho	
	 */
	public function usuariohabilidad(){
		return $this->hasMany('UsuarioHabilidad', 'usuario_id');
	}

}
