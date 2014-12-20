<?php 
	class UsuarioExpectativa extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'usuariosexpectativas';

		public function usuario(){
			return $this->belongsTo('User');
		}
	}
?>

