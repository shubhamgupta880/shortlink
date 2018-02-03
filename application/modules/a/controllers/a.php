<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';

class A extends REST_Controller
{
	

	public function index_get()
	{

		$this->load->helper('form');
		// $this->load->view('link');

		$this->load->model('url_model');
		$v = $this->url_model->get_all_link();
		$this->load->view('homepage',['alldata'=>$v]);

	}

	public function shorten_url_post()
	{

			

		$this->form_validation->set_rules('url', 'URL', 'trim|prep_url|required|min_length[5]|max_length[250]');

		if($this->form_validation->run())
		{

		$full_url = $this->input->post('url');
					$this->load->model('url_model');

					if($this->url_model->checkurl($full_url))
					{
						//Get the title of website
						$urlContents = file_get_contents($full_url);
						preg_match("/<title>(.*)<\/title>/i", $urlContents, $matches);
						$title =  $matches[1];

						if(!$title)
						{
							echo "No title Found";
						}

							$this->load->helper('string');
						 //	$ran = random_string('alnum', 6);
							$ran = $this->generate_random_string(1);
							
							
			 			$this->load->model('url_model');
		 				$short_url =   $this->url_model->store_long_url($full_url,$ran,$title);

							 if($short_url)
							 {
									 	$this->load->library('session');
									 	$this->session->set_userdata('short_url',$short_url);
									 	$id = $this->session->userdata('short_url');
									 	
									 	$showlink = $this->url_model->get_short_url($id);
									 	// $showlink->long_url
									 	if($showlink)
									 	{			
									 		$this->session->set_userdata('showlink',$showlink);
									 		$this->load->view('shortlink_view');

									 		// echo 'Your Short Link for  '.$showlink->long_url.' is ';
									 		// echo '<a href= '.$showlink->long_url.' >'.$showlink->short_url.'</a>';
									 	}
									 	else
									 	{
									 		echo "No Links Found";
									 	}
							 }else
							 {
							 	echo "Some Error occured in making Short URL";
							 }
					}else
					{
						echo "This url already exits";
					} 

		}
		else
		{
			$this->load->view('homepage');
		}
	}
public function generate_random_string($value1)
{
	$string = random_string('alnum', 6);
	//check in db $flag
	$this->load->model('url_model');
	$flag = $this->url_model->checkshorturl($string);


	if($flag==TRUE)
	{
		return $string = random_string('alnum', 6);
	}
	else
	{
		return $string;
	}

}
	public function all_links_get($id)
	{
		
		$this->load->model('url_model');
		$key = $this->url_model->seperate($id);
		if($key)
		{
			$click_count=0;
			$id = 	 $key->id;	
			$count = $key->clicks;
			$click_count = $count;
			$click_count++;
			
			
			if($this->url_model->insert_click_count($click_count,$id))
			{
				
				redirect($key->long_url);
			}else
			{
				echo "Some Error Occured!!!! Please try again";
			}
			//redirect($key->long_url);
		}
		
	}

	public function link_data_get($id)
	{
		$this->load->model('url_model');
		$s_t = $this->url_model->status($id);

		if($s_t)
		{
			$this->load->view('status_view',['status'=>$s_t]);
		}else
		{

		}
	}





}



 ?>