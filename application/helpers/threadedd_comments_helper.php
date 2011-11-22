<?php 

//jon gales
//Made with help from http://www.jongales.com/blog/2009/01/27/php-class-for-threaded-comments/

class Threaded_comments
{

    public $parents  = array();
    public $children = array();

    /**
     * @param array $comments
     */
    function __construct($comments)
    {
        foreach ($comments as $comment)
        {
            if ($comment['parent_id'] === NULL)
            {
                $this->parents[$comment['id']][] = $comment;
            }
            else
            {
                $this->children[$comment['parent_id']][] = $comment;
            }
        }
    }

    /**
     * @param array $comment
     * @param int $depth
     */
    private function format_comment($comment, $depth)
    {
		$comment_string = "";
		$comment_string .=  '<li data-id ="'.$comment['id'].'" class = "level-'.$depth.'" >';
        $comment_string .=  $comment['author']."-".$comment['text'];
		$comment_string .= 	'<a href = "#reply" class = "reply-link"> Reply </a>';
		$comment_string .=  '</li>';
		
		return $comment_string;
		
		
    }

    /**
     * @param array $comment
     * @param int $depth
     */
    private function print_parent($comment, $depth = 0)
    {
		$comment_string = "";
	
        foreach ($comment as $c)
        {
            $comment_string .= $this->format_comment($c, $depth);

            if (isset($this->children[$c['id']]))
            {
                $comment_string .=$this->print_parent($this->children[$c['id']], $depth + 1);
            }
        }
		
		
		return $comment_string;
    }

    public function print_comments()
    {
		$comment_string = "";
        foreach ($this->parents as $c)
        {
            $comment_string .= $this->print_parent($c);
        }
		
		return $comment_string;
    }
	


}
?>