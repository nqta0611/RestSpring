<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$url = 'http://10.0.0.213:8080/demo/all';
 
		//Use file_get_contents to GET the URL in question.
		$contents = file_get_contents($url);
		 
		//If $contents is not a boolean FALSE value.
		if($contents !== false){
			$userList = json_decode($contents, true);
			$data = array("userList" => $userList);
			/*foreach ($userList as $key => $value) {
				echo $value["id"] . " : " . $value["name"] . ", " . $value["email"] . "<br>";
  			}*/
		}
		$this->load->view('user', $data);
	}
}
