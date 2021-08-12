<?php

	include_once "Controller.php";

	class StringController extends Controller {
		public function __construct(){

			parent::__construct();
		}

		public function indexAction(){
			$this->view->render('index.phtml');
		}

		public function explodeAction(){
			// Get Data from $_POST
			$text = $_POST['text'];
			$data['error'] = false;
			//Check for errors
			if(empty($text)){
				$data ['error'] = true;
			}
			else{
				$data['result'] = explode(' ',$text);
			}

			echo json_encode($data);


//			//Render View
//			$this->view->render('exploded.phtml',$data);
		}
	}