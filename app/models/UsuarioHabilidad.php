<?php 
	class UsuarioHabilidad extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'usuarioshabilidades';

	
		public function usuario(){
			return $this->belongsTo('User');
		}	
	}
 ?>