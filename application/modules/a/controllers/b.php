<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
class B extends REST_Controller
{

	public function index_get()
	{
		echo "Please Enter the full URL";
	}
	public function ind_get($c)
	{
		if(isset($c))
		{
				$this->load->model('url_model');
				$d = $this->url_model->people($c);

			

				if($d)
				{
					$click_count=0;
					$id = 	 $d->id;
					$count = $d->clicks;
					$click_count = $count;
					$click_count++;
					
					
					if($this->url_model->insert_click_count($click_count,$id))
					{
						
						redirect($d->long_url);
					}else
					{
						echo "Some Error Occured!!!! Please try again";
					}

					
				}
				else
				{
					echo "Please Enter Valid URL";
				}

	}

}

	

	

	
}

 ?>