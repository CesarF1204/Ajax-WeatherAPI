<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WeathersAPI extends CI_Controller {

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
	public function index() {
		$this->load->view('weathersapi/index.php');
	}
	public function weather() {
		$html = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($this->input->post('city'))."&appid=fbb11aed1187a88530a433e05749e8a4");
		$data = json_decode($html);
		$temperature['city'] = $data->main->temp;
		$this->load->view('partials/index.php', $temperature);
	}
}
