<?php
	class User extends CI_Controller {

		public function index() {
			$this->login();
		}

		public function login() {
			$data['title'] = 'Entrar';
			$this->load->view('login', $data);
		}

		public function login_validation() {
			$autoload['drivers'] = array('session');

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('user_model');
			if($this->user_model->can_login($username, $password)) {
				$this->session->set_userdata("login", $username);
				redirect('store/');
			} else {
				$this->session->set_flashdata('error', 'Usuário ou senha inválidos.');
				redirect('user/login');
			}
		}

		public function logout() {
			$this->session->unset_userdata("login");
			redirect('user');
		}
	}
?>