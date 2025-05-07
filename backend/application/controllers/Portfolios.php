<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    // List all portfolios
    public function index()
    {
        $data['portfolios'] = $this->Portfolio_model->get_portfolios();
        $this->load->view('portfolios/index', $data);
    }

    // Show form to create new portfolio
    public function create()
    {
        $this->load->view('portfolios/create');
    }

    // Save new portfolio
    public function store()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('portfolios/create');
        }
        else
        {
            $this->Portfolio_model->set_portfolio();
            redirect('portfolios');
        }
    }

    // Show form to edit portfolio
    public function edit($id)
    {
        $data['portfolio'] = $this->Portfolio_model->get_portfolio($id);

        if (empty($data['portfolio']))
        {
            show_404();
        }

        $this->load->view('portfolios/edit', $data);
    }

    // Update portfolio
    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->edit($id);
        }
        else
        {
            $this->Portfolio_model->update_portfolio($id);
            redirect('portfolios');
        }
    }

    // Delete portfolio
    public function delete($id)
    {
        $this->Portfolio_model->delete_portfolio($id);
        redirect('portfolios');
    }
}
