<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		//set page title
		$data['title'] = "All Users";
		$data['query'] = $this->user_model->get_all_users();
		$this->load->view('thread/users',$data);

	}
	
	//this function will retrive all entry in the database
	public function profile($username)
	{
		//set page title
		$data['title'] = "User";
		$data['query'] = $this->user_model->get_user($username);
		
		$data['comments'] = $this->user_model->get_user_comments($username);
		
		$this->load->view('thread/user',$data);

	}
	
}
