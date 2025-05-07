<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alerts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Alert_model');
        $this->load->model('Portfolio_model');
        $this->load->model('Coin_model');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    // List all alerts
    public function index()
    {
        $data['alerts'] = $this->Alert_model->get_alerts();
        $this->load->view('alerts/index', $data);
    }

    // Show form to create new alert
    public function create()
    {
        $data['portfolios'] = $this->Portfolio_model->get_portfolios();
        $data['coins'] = $this->Coin_model->get_coins();
        $this->load->view('alerts/create', $data);
    }

    // Save new alert
    public function store()
    {
        $this->form_validation->set_rules('portfolio_id', 'Portfolio', 'required');
        $this->form_validation->set_rules('coin_id', 'Coin', 'required');
        $this->form_validation->set_rules('target_price', 'Target Price', 'required|numeric');
        $this->form_validation->set_rules('direction', 'Direction', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE)
        {
            $this->create();
        }
        else
        {
            $this->Alert_model->set_alert();
            redirect('alerts');
        }
    }

    // Show form to edit alert
    public function edit($id)
    {
        $data['alert'] = $this->Alert_model->get_alert($id);
        $data['portfolios'] = $this->Portfolio_model->get_portfolios();
        $data['coins'] = $this->Coin_model->get_coins();

        if (empty($data['alert']))
        {
            show_404();
        }

        $this->load->view('alerts/edit', $data);
    }

    // Update alert
    public function update($id)
    {
        $this->form_validation->set_rules('portfolio_id', 'Portfolio', 'required');
        $this->form_validation->set_rules('coin_id', 'Coin', 'required');
        $this->form_validation->set_rules('target_price', 'Target Price', 'required|numeric');
        $this->form_validation->set_rules('direction', 'Direction', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE)
        {
            $this->edit($id);
        }
        else
        {
            $this->Alert_model->update_alert($id);
            redirect('alerts');
        }
    }

    // Delete alert
    public function delete($id)
    {
        $this->Alert_model->delete_alert($id);
        redirect('alerts');
    }
}
