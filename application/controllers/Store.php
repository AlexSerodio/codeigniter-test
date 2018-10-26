<?php

    require APPPATH . '/libraries/ImplementJWT.php';

    class Store extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->jwt = new ImplementJWT();

            $this->load->model('store_model');
            $this->load->helper('url_helper');
        }

        public function index() {
            $data['store'] = $this->store_model->get_store();
            $data['title'] = 'Estabelecimentos Cadastrados';

            $this->load->view('store/index', $data);
        }

        public function register() {
            $this->load->view('store/create');
        }

        public function search() {
            $zipcode = $this->input->post('search-title');
            $data['store'] = $this->store_model->get_store($zipcode);
            $data['title'] = 'Estabelecimentos Cadastrados';

            $this->load->view('store/index', $data);
        }

        public function create() {

            $token = $this->input->get_request_header("authorization-token");

            // TODO - decode token here
            echo $token;

            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Adicionar novo estabelecimento comercial';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');

            if ($this->form_validation->run() === FALSE) {
                //$this->load->view('store/create');
            } else {
                $this->store_model->set_store();
                //redirect('store');
            }
        }
    }
?>