<?php
class Pages extends CI_Controller {

    public function view($page = 'home') {
	    if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
	        show_404();		// built-in CodeIgniter function that renders the default error page
	    }

	    $data['title'] = ucfirst($page); // Capitalize the first letter

	    //$this->load->view('templates/header', $data);
	    $this->load->view('pages/'.$page, $data);
	    //$this->load->view('templates/footer', $data);
	}

	public function login() {
		$data['title'] = 'Entrar';
		$this->load->view('login', $data);
	}

	/*public function login_validation() {
		$autoload['drivers'] = array('session');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('pages_model');
			if($this->pages_model->can_login($username, $password)) {
				$this->session->set_userdata("login", $username);
				redirect('news/create');
			} else {
				$this->session->set_flashdata('error', 'Usuário ou senha inválidos.');
				redirect('pages/login');
			}
		} else {
			$this->login();
		}
	}*/

	public function login_validation() {
		$autoload['drivers'] = array('session');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('pages_model');
		if($this->pages_model->can_login($username, $password)) {
			$this->session->set_userdata("login", $username);
			redirect('news/create');
		} else {
			$this->session->set_flashdata('error', 'Usuário ou senha inválidos.');
			redirect('pages/login');
		}
	}

	public function logout() {
		$this->session->unset_userdata("login");
		redirect('pages/login');
	}
}