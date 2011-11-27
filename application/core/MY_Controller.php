<?php

class MY_Controller extends CI_Controller {

  function MY_Controller() {
    parent::__construct();
	
	$this->load->helper('url');
	$this->load->library('tank_auth');
	
	if (!$this->tank_auth->is_logged_in()) {
		redirect('/auth/login/');
	}
	
  } 
  
} 

?>