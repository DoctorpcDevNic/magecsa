<?php 
	class UsuarioOtro extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'usuariosotros';

		public function usuario(){
			return $this->belongsTo('User');
		}
	}
?>

