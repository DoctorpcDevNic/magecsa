<?php 
	class UsuarioContacto extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'usuarioscontactos';

		public function usuarioexperiencia(){
			return $this->belongsTo('UsuarioExperiencia');
		}
	}
?>

