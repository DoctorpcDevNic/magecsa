<?php 
	class UsuarioAdmin extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'usuariosadmin';

		public function usuario(){
			return $this->belongsTo('User');
		}
	}
?>

