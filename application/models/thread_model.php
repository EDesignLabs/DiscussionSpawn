<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 
	 * @author Pisyek Kumar
	 * @email pisyek@gmail.com
	 * @link http://www.pisyek.com
	 */

class thread_model extends CI_Model {

	function get_all_posts()
	{
		//get all entry, sort by latest to oldest
		$this->db->order_by('entry_date','desc');
		$query = $this->db->get('entry');
		return $query->result();
	}
	
	function add_new_entry($type, $position = "left", $top = "300", $field1 = "" ,$field2 = "",$field3 = "")
	{
		if ($this->tank_auth->is_logged_in()) {
			$data = array(
				'entry_type' => $type,
				'field1' => $field1,
				'field2' => $field2,
				'field3' => $field3,
				'author_id' => $this->tank_auth->get_user_id(),
				'position' => $position,
				'top' => $top
			);
			$this->db->insert('entry',$data);
			return $this->db->insert_id();
		}
	}
	
	function add_new_comment($post_id,$parent_id,$parent_username,$parent_comment,$commentor,$email,$comment)
	{
		//Add to comments
		$data = array(
			'entry_id'=>$post_id,
			'comment_parent'=>$parent_id,
			'comment_name'=>$commentor,
			'comment_email'=>$email,
			'comment_body'=>$comment,
		);
		$this->db->insert('comment',$data);
		
		//Send notification to user if they are replying
		if ($parent_id != null){
		
			$data = array(
				'username'=>$parent_username,
				'post_id'=>$post_id,
				'type'=>"reply",
				'message'=>'Someone has replyed to "'.substr($parent_comment,0,40).'..."  !'
			);
			
			$this->db->insert('notifications',$data);
		
		}
		
	}
	
	function get_post($id)
	{
		$this->db->where('entry_id',$id);
		$query = $this->db->get('entry');
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function get_post_comment($post_id)
	{
		$this->db->where('entry_id',$post_id);
		$query = $this->db->get('comment');
		return $query->result();
	}
	
	function total_comments($id)
	{
		$this->db->like('entry_id', $id);
		$this->db->from('comment');
		return $this->db->count_all_results();
	}
	
	public function move_entry($entry_id, $top, $position){
		$data = array(
					   'top' => $top,
					   'position' => $position
					);

		$this->db->where('entry_id', $entry_id);
		$this->db->update('entry', $data);

	
	}
	
	public function delete_entry($entry_id){
		$this->db->delete('entry', array('entry_id' => $entry_id)); 
	}
	
	public function delete_comment($comment_id){
		$this->db->delete('comment', array('comment_id' => $comment_id)); 
	}
}

/* End of file thread_model.php */
/* Location: ./application/models/thread_model.php */