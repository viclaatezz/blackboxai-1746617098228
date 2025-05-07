<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coins extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Coin_model');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    // List all coins
    public function index()
    {
        $data['coins'] = $this->Coin_model->get_coins();
        $this->load->view('coins/index', $data);
    }

    // Show form to create new coin
    public function create()
    {
        $this->load->view('coins/create');
    }

    // Save new coin
    public function store()
    {
        $this->form_validation->set_rules('symbol', 'Symbol', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('coins/create');
        }
        else
        {
            $this->Coin_model->set_coin();
            redirect('coins');
        }
    }

    // Show form to edit coin
    public function edit($id)
    {
        $data['coin'] = $this->Coin_model->get_coin($id);

        if (empty($data['coin']))
        {
            show_404();
        }

        $this->load->view('coins/edit', $data);
    }

    // Update coin
    public function update($id)
    {
        $this->form_validation->set_rules('symbol', 'Symbol', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->edit($id);
        }
        else
        {
            $this->Coin_model->update_coin($id);
            redirect('coins');
        }
    }

    // Delete coin
    public function delete($id)
    {
        $this->Coin_model->delete_coin($id);
        redirect('coins');
    }
}
