<?php 
class Url_model extends CI_Model
{
	public function store_long_url($full_url,$ran,$title)
	{

			$data = array(
				'long_url'=>$full_url,
				'short_url'=>$ran,
				'title'=>$title
				);	

				 $this->db->insert('urls',$data);
				 return $this->db->insert_id('urls');
				 
				// echo str_replace('=','-',base64_encode($t));exit;

	}

	public function get_short_url($id)
	{
		$g = $this->db->from('urls')
					->where('id',$id)
					->get();
					
					return $g->row();
	}

	public function get_all_link()
	{
		
		$q = $this->db->from('urls')
				->get();
				return $q->result();
	}


	public function seperate($id)
	{
		$g = $this->db->from('urls')
					->where('id',$id)
					->get();
					
					return $g->row();
	}


	public function people($c)
	{

		$z = $this->db->from('urls')
					->where('short_url',$c)
					->get();
					
					return $z->row();
	}

	public function checkurl($full_url)
	{
		$s = $this->db->where('long_url',$full_url)
						->from('urls')
					->get();

					if($s->num_rows())
					{
						return TRUE;
					}else
					{
						return TRUE;
					}
	}

	public function insert_click_count($click_count,$id)
	{

		$data = array('clicks'=>$click_count);

		return	$this->db->where('id',$id)
						->update('urls',$data);
	}

	public function status($id)
	{
		$status = $this->db->from('urls')
					->where('id',$id)
					->get();
					
					
					return $status->row();
					
	}

	public function checkshorturl($string)
	{
		$g = $this->db->where('short_url',$string)
					->from('urls')
					->get();

					if($g->num_rows())
					{
						return TRUE;
					}else
					{
						return FALSE;
					}
					
	}



}




 ?>