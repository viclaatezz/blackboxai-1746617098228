<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
        $this->load->model('Portfolio_model');
        $this->load->model('Coin_model');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }

    // List all transactions
    public function index()
    {
        $data['transactions'] = $this->Transaction_model->get_transactions();
        $this->load->view('transactions/index', $data);
    }

    // Show form to create new transaction
    public function create()
    {
        $data['portfolios'] = $this->Portfolio_model->get_portfolios();
        $data['coins'] = $this->Coin_model->get_coins();
        $this->load->view('transactions/create', $data);
    }

    // Save new transaction
    public function store()
    {
        $this->form_validation->set_rules('portfolio_id', 'Portfolio', 'required');
        $this->form_validation->set_rules('coin_id', 'Coin', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('transaction_date', 'Transaction Date', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->create();
        }
        else
        {
            $this->Transaction_model->set_transaction();
            redirect('transactions');
        }
    }

    // Show form to edit transaction
    public function edit($id)
    {
        $data['transaction'] = $this->Transaction_model->get_transaction($id);
        $data['portfolios'] = $this->Portfolio_model->get_portfolios();
        $data['coins'] = $this->Coin_model->get_coins();

        if (empty($data['transaction']))
        {
            show_404();
        }

        $this->load->view('transactions/edit', $data);
    }

    // Update transaction
    public function update($id)
    {
        $this->form_validation->set_rules('portfolio_id', 'Portfolio', 'required');
        $this->form_validation->set_rules('coin_id', 'Coin', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('transaction_date', 'Transaction Date', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->edit($id);
        }
        else
        {
            $this->Transaction_model->update_transaction($id);
            redirect('transactions');
        }
    }

    // Delete transaction
    public function delete($id)
    {
        $this->Transaction_model->delete_transaction($id);
        redirect('transactions');
    }
}
