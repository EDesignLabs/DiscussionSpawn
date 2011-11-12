<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Credit goes to Pisyek Kumar for the intial framework
//http://blog.pisyek.com/2011/05/create-a-simple-blog-using-codeigniter-2-0-part-2/

class thread extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('thread_model');
	}

	//this function will retrive all entry in the database
	public function index()
	{
		//set page title
		$data['title'] = "Home";
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		
		$data['query'] = $this->thread_model->get_all_posts();
		$this->load->view('thread/index',$data);
	}
	
	public function about()
	{
		//set page title
		$data['title'] = "About";
		$this->load->view('thread/about',$data);
	}
	
	//this function will retrive a post
	public function post($id)
	{
		$data['query'] = $this->thread_model->get_post($id);
		$data['comments'] = $this->thread_model->get_post_comment($id);
		$data['post_id'] = $id;
		$data['total_comments'] = $this->thread_model->total_comments($id);
		
		$this->load->helper('form');
		$this->load->library(array('form_validation','session'));
		
		//set validation rules
		$this->form_validation->set_rules('commentor', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		
		if($this->thread_model->get_post($id))
		{
			foreach($this->thread_model->get_post($id) as $row)
			{
				//set page title
				$data['title'] = $row->entry_name;
			}
			
			if ($this->form_validation->run() == FALSE)
			{
				//if not valid
				$this->load->view('thread/post',$data);
			}
			else
			{
				//if valid
				$name = $this->input->post('commentor');
				$email = strtolower($this->input->post('email'));
				$comment = $this->input->post('comment');
				$post_id = $this->input->post('post_id');
				
				$this->thread_model->add_new_comment($post_id,$name,$email,$comment);
				$this->session->set_flashdata('message', '1 new comment added!');
				redirect('post/'.$id);
			}
		}
		else
			show_404();
	}
	
	public function add_new_entry()
	{
		//set page title
		$data['title'] = "Add new post";
		
		$this->load->helper('form');
		$this->load->library(array('form_validation','session'));
		
		//set validation rules
		$this->form_validation->set_rules('entry_name', 'Title', 'required|max_length[200]');
		$this->form_validation->set_rules('entry_body', 'Body', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//if not valid
			$this->load->view('thread/add_new',$data);
		}
		else
		{
			//if valid
			$name = $this->input->post('entry_name');
			$body = $this->input->post('entry_body');
			$position = $this->input->post('position');
			$this->thread_model->add_new_entry($name,$body, $position);
			$this->session->set_flashdata('message', '1 new post added at position '.$position.' !' );
			redirect('new-post');
		}
	}
	
	public function update_top($entry_id, $top){
		$this->thread_model->move_entry_top($entry_id, $top);
		echo "hello success";
	
	}
}

/* End of file thread.php */
/* Location: ./application/controllers/thread.php */