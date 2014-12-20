<?php 
	class UsuarioEducacion extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'usuarioseducacion';

		public function usuario(){
			return $this->belongsTo('User');
		}
	}
?>

