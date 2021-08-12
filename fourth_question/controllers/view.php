<?php

	//Base View Class

	class View{
		function __construct()
		{
		}

		public function render($name, $data = false){
			if($data){
				extract($data, EXTR_PREFIX_ALL, "view");
			}
			include $name;
		}
	}