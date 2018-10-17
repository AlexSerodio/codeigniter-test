<?php
class Pages extends CI_Controller {

    public function view($page = 'home') {
	    if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
	        show_404();		// built-in CodeIgniter function that renders the default error page
	    }

	    $data['title'] = ucfirst($page); // Capitalize the first letter

	    // load the views in the order they should be displayed
	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/'.$page, $data);
	    $this->load->view('templates/footer', $data);
	}
}