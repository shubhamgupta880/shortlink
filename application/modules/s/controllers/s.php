<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 require APPPATH . 'libraries/REST_Controller.php';

class S extends REST_Controller
{

	public function index_get()
	{
		echo "Please Enter full URL";
	}

	public function li_get($c)
		{
		 	$this->load->model('a/url_model');
			$r = $this->url_model->people($c);

			if($r)
			{
				$click_count=0;
					$id = 	 $r->id;
					$count = $r->clicks;
					$click_count = $count;
					$click_count++;

					if($this->url_model->insert_click_count($click_count,$id))
					{
						
						redirect($r->long_url);
					}else
					{
						echo "Some Error Occured!!!! Please try again";
					}



			}else
			{
				echo "Please Enter valid URL";
			}
		
	 
		}

}

 ?>