<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	require APPPATH . '/libraries/ImplementJWT.php';

	class User extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->jwt = new ImplementJWT();
		}

		public function index() {
			$data['title'] = 'Entrar';
			$this->load->view('login', $data);
		}

		function login_validation() {
			$this->load->model('user_model');

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$token = array();

			if(!$this->user_model->can_login($username, $password)) {
				return $this->output
					->set_status_header(400)
					->set_content_type('application/json')
					->set_output(json_encode(array('error' => $token)));
				
				var_dump($this->input->post());
				exit;
			}

			$issuedAt = time();
			$data = [
			    'iat' => $issuedAt,
			    'nbf' => $issuedAt + 10,
			    'exp' => $issuedAt + 70,
			    'data' => [
					'username' => $username,
			        'password' => $password,
			    ]
			];

			$token = $this->jwt->generateToken($data);

			return $this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode(array('success' => $token)));

			var_dump($this->input->post());
			exit;
		}

		public function logout() {
			$this->session->unset_userdata("login");
			redirect('user');
		}
	}
?>
