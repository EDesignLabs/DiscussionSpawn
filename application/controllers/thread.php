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
		
		$data['user_id']	    = $this->tank_auth->get_user_id();
		$data['username']	    = $this->tank_auth->get_username();
		

		$data['query'] = $this->thread_model->get_all_posts();
		$this->load->view('thread/index',$data);

	}

	
	//this function will retrive a post
	public function post($id)
	{
		$this->load->helper('threaded_comments');
		
		$data['username']	= $this->tank_auth->get_username();
		$data['query'] = $this->thread_model->get_post($id);
		$data['comments'] = $this->thread_model->get_post_comment($id);
		$data['post_id'] = $id;
		$data['total_comments'] = $this->thread_model->total_comments($id);
		
		//get comments and format them
		$comments = $this->thread_model->get_post_comment($id); 
		$comments_arr =  array();
		if($comments) {
			foreach($comments as $row){
				if ($row->comment_parent == 0)
					$row->comment_parent = NULL;
			
				$comments_arr[] = array('id'=>$row->comment_id, 'parent_id'=>$row->comment_parent,'entry_id'=>$row->entry_id, 'text'=>$row->comment_body ,  'author'=>$row->comment_name , 'date' =>  mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($row->comment_date)));
			
			}
		}
		
		$threaded_comments = new Threaded_comments($comments_arr);
		$data['formated_comments'] = $threaded_comments->print_comments();
		
		
		$this->load->helper('form');
		$this->load->library(array('form_validation','session'));
		
		//set validation rules
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		

		
		if($this->thread_model->get_post($id))
		{
			foreach($this->thread_model->get_post($id) as $row)
			{
				//set page title
				$data['title'] = $row->field1;
			}
			
			if ($this->form_validation->run() == FALSE)
			{
				//if not valid
				$this->load->view('nodes/'.$row->entry_type."/post",$data);
				
			}
			else
			{
				//if valid
				$name = $this->tank_auth->get_username();
				$email = strtolower($this->input->post('email'));
				$comment = $this->input->post('comment');
				$post_id = $this->input->post('post_id');
				$parent_id = $this->input->post('parent_id');
				$parent_username = $this->input->post('parent_username');
				$parent_comment =  $this->input->post('parent_comment');
				
				$this->thread_model->add_new_comment($post_id,$parent_id,$parent_username,$parent_comment,$name,$email,$comment);
				$this->session->set_flashdata('message', '1 new comment added!');
				redirect('post/'.$id);
			}
		}
		else
			show_404();
	}

	
	public function add_new_entry(){
		
		$top = "";
		$position = "";
		$entry_type = "";	
		$field1 = "";
		$field2 = "";
		$field3 = "";
		
		if (!($this->input->post('field1')==false))
			$field1 = $this->input->post('field1');
			
		if (!($this->input->post('field2')==false))
			$field2 = $this->input->post('field2');
			
		if (!($this->input->post('field3')==false))
			$field3 = $this->input->post('field3');
			
		if (!($this->input->post('top')==false))
			$top = $this->input->post('top');
			
		if (!($this->input->post('position')==false))
			$position = $this->input->post('position');
			
		if (!($this->input->post('entry_type')==false))
			$entry_type = $this->input->post('entry_type');

		echo $this->thread_model->add_new_entry($entry_type, $position, $top, $field1,$field2,$field3 );
	}
	
	
	public function update_location($entry_id, $top, $position){
		$this->thread_model->move_entry($entry_id, $top, $position);
		echo "hello success: Moved Location";
	
	}
	
	public function delete_entry($entry_id){
		$this->thread_model->delete_entry($entry_id);
		echo "hello success: Deleted Enrty";
	
	}
	
	public function get_template(){
		
		$post->entry_id = "";
		$post->field1 = "No feild1";
		$post->field2 = "No feild2";
		$post->field3 = "No feild3";
		
		if (!($this->input->post('field1')==false))
			$post->field1 = $this->input->post('field1');
			
		if (!($this->input->post('field2')==false))
			$post->field2 = $this->input->post('field2');
			
		if (!($this->input->post('field3')==false))
			$post->field3 = $this->input->post('field3');
		
		if ($this->input->post('template'))
			$this->load->view('nodes/'.$this->input->post('template')."/thread", array('post' => $post));
		else
			echo "THERE IS NO TEMPLATE WITH THAT NAME.";
	}
	
	public function delete_comment($comment_id,$post_id){
		$this->thread_model->delete_comment($comment_id);
		redirect('post/'.$post_id);
	}
	
}

/* End of file thread.php */
/* Location: ./application/controllers/thread.php */