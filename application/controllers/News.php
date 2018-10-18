<?php
    class News extends CI_Controller {

        public function __construct() {
            parent::__construct();

            if(!$this->session->has_userdata('username')) {
                redirect('pages/login');
            }

            $this->load->model('news_model');
            $this->load->helper('url_helper');
        }

        public function index() {
            $data['news'] = $this->news_model->get_news();
            $data['title'] = 'News archive';

            $this->load->view('templates/header', $data);
            $this->load->view('news/index', $data);
            $this->load->view('templates/footer');
        }

        public function create() {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Adicionar novo estabelecimento comercial';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');

            } else {
                $this->news_model->set_store();
                $this->load->view('news/success');
            }
        }

        public function view($zipcode = NULL) {
            $data['store_item'] = $this->news_model->get_store($zipcode);

            if (empty($data['store_item'])) {
                show_404();
            }

            $data['title'] = $data['store_item']['name'];

            $this->load->view('templates/header', $data);
            $this->load->view('news/view', $data);
            $this->load->view('templates/footer');
        }
    }