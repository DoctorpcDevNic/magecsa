<?php 
	class UsuarioDato extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'usuariosdatos';

		public function usuario(){
			return $this->belongsTo('User');
		}
	}
?>

