<?php 
	class UsuarioExperiencia extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'usuariosexperiencias';

		public function usuario(){
			return $this->belongsTo('User');
		}

		public function usuariocontacto(){
			return $this->hasMany('UsuarioContacto', 'usuario_experiencia_id');
		}
	}
?>

