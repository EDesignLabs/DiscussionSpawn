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
	
		$this->load->library('TextStatistics');
		//echo 
		
		//set page title
		$data['title'] = "User";
		$data['query'] = $this->user_model->get_user($username);
		
		$data['comments'] = $this->user_model->get_user_comments($username);
		$comments = $data['comments'];
		$complete_text = "";
		
		$average_word_count_per_entry = 0;
		$total_entries = 0;
		
		if($comments): foreach($comments as $comment):
			if ($this->textstatistics->word_count($comment->comment_body)> 3){
			
				$average_word_count_per_entry += $this->textstatistics->word_count($comment->comment_body);
				$total_entries += 1;
				$complete_text .= trim($comment->comment_body, ".").". " ;
			}
		endforeach;
		endif; 
		
		$data['flesch_kincaid'] = $this->textstatistics->flesch_kincaid_grade_level($complete_text);
		$data['gunning_fog_score'] = $this->textstatistics->gunning_fog_score($complete_text);
		$data['coleman_liau_index'] = $this->textstatistics->coleman_liau_index($complete_text);
		$data['smog_index'] = $this->textstatistics->smog_index($complete_text);
		$data['automated_readability_index'] = $this->textstatistics->automated_readability_index($complete_text);
		$data['average'] = ($data['flesch_kincaid']+$data['gunning_fog_score']+$data['coleman_liau_index']+$data['smog_index']+$data['automated_readability_index'])/5;
		
		$data['sentence_count'] = $this->textstatistics->sentence_count($complete_text);
		$data['word_count'] = $this->textstatistics->word_count($complete_text);
		$data['average_words_per_sentence'] = $this->textstatistics->average_words_per_sentence($complete_text);
		$data['average_words_per_entry'] = $average_word_count_per_entry/$total_entries;
		
		$this->load->view('thread/user',$data);

	}
	
	public function get_notices(){
		echo json_encode($this->user_model->get_user_notifications($this->tank_auth->get_username()));
	
	}
	
	public function replies(){
		$data['title'] = "User Replies";
		$data['query'] = $this->user_model->get_replies($this->tank_auth->get_username());
		$this->load->view('thread/replies',$data);

	
	}
	
	
}
