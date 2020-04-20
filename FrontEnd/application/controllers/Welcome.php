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
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('footer');
	}

	public function drink()
	{
		$url = $this->config->item('api_url') . 'demo/all_drink';
		//Use file_get_contents to GET the URL in question.
		$contents = file_get_contents($url);
		//If $contents is not a boolean FALSE value.
		if($contents !== false){
			$drinkList = json_decode($contents, true);
			$data = array("drinkList" => $drinkList);
		}
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('drink', $data);
		$this->load->view('footer');
	}


	public function fridge()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('footer');
	}

	public function music()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('footer');
	}

	public function general()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('footer');
	}
}
