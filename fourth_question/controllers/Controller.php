<?php

	require_once 'view.php';

	// Base controller class for each new controller

	class Controller{
		protected $view;

		function __construct()
		{
			$this->view = new View();
		}
	}