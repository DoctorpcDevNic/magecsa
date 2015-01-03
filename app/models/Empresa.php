<?php 
	class Empresa extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'empresas';

		public function usuario(){
			return $this->belongsTo('User');
		}
	}
?>
